document.addEventListener("DOMContentLoaded", () => {
    initSwiper();
    initMenu();
    // initApi();
    // initDropdown();
});

function initSwiper() {

    const swiperTools = new Swiper(".tools-slider", {
        slidesPerView: 1,
        loop: true,
        speed: 500,
        spaceBetween: 0,
        grabCursor: true,
        watchSlidesProgress: true,
        // autoplay: {
        //     delay: 3000,
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // navigation: {
        //     nextEl: ".arrow_next",
        //     prevEl: ".arrow_prev",
        // },
    });
}

function initMenu() {
    // Menu
    const menuIcon = document.getElementById("burger"),
        hamburgerIcon = document.getElementById("mobile-menu");
    if (menuIcon) {
        menuIcon.addEventListener("click", () => {
            menuIcon.classList.toggle("active");
            hamburgerIcon.classList.toggle("active");
        });
    }
}

function initApi() {
    const сurrencyData = JSON.parse(bitmelech.currency_data);
    // Api
    const requestURLCurrency = "https://api.bitmelech.com/api/2/public/ticker";
    const requestURLPriceHistory =
        "https://api.bitmelech.com/api/2/public/trades";
    const coinsTableBody = document.getElementById("coinschart-body");

    let chartArr = [];
    let ctx = [];

    const getDataCoins = async(url, data) => {
        const response = await fetch(url),
            json = await response.json();

        let result = [];

        if (data.length !== 0) {
            result = json.filter((item) =>
                data.some((e) => item.symbol === e.currencyID)
            );
            result = data.map((a) =>
                result.find((x) => x.symbol === a.currencyID)
            );
        }

        return result;
    };

    const getCurrencyPriceHistory = async(url, data) => {
        return await Promise.all(
            data.map(async(item, index) => {
                let result = [];

                if (data.length !== 0) {
                    const urlFull = `${url}/${item.currencyID}?sort=DESC`;

                    const response = await fetch(urlFull),
                        json = await response.json();

                    result = json.map(({ price }) => price);
                }

                return result.reverse();
            })
        );
    };

    const updateCurrencyData = (data, index) => {
        const priceSlide = document.querySelectorAll(".coins-price-slide-num"),
            rateSlide = document.querySelectorAll(".coins-rate-slide-num"),
            priceDesktopTable = document.querySelectorAll(
                ".coins-price-table-desktop-num"
            ),
            priceMobTable = document.querySelectorAll(
                ".coins-price-table-mob-num"
            ),
            rateDesktopTable = document.querySelectorAll(
                ".coins-rate-table-desktop-num"
            ),
            rateMobTable = document.querySelectorAll(
                ".coins-rate-table-mob-num"
            ),
            coinsRateSlide = document.querySelectorAll(".coins-rate-slide"),
            coinsRateDesktopTable = document.querySelectorAll(
                ".coins-rate-table-desktop"
            ),
            coinsRateMobTable = document.querySelectorAll(
                ".coins-rate-table-mob"
            );

        if (priceSlide[index]) {
            priceSlide[index].innerHTML = data.price;
        }
        if (rateSlide[index]) {
            rateSlide[index].innerHTML =
                data.difference < 0 ? data.difference : `+${data.difference}`;
        }
        if (priceDesktopTable[index]) {
            priceDesktopTable[index].innerHTML = data.price;
        }
        if (priceMobTable[index]) {
            priceMobTable[index].innerHTML = data.price;
        }
        if (rateDesktopTable[index]) {
            rateDesktopTable[index].innerHTML =
                data.difference < 0 ? data.difference : `+${data.difference}`;
        }
        if (rateMobTable[index]) {
            rateMobTable[index].innerHTML =
                data.difference < 0 ? data.difference : `+${data.difference}`;
        }

        if (data.difference < 0) {
            if (coinsRateSlide[index].classList.contains("coins-rate_plus")) {
                coinsRateSlide[index].classList.remove("coins-rate_plus");
                coinsRateDesktopTable[index].classList.remove(
                    "coins-rate_plus"
                );
                if (coinsRateMobTable[index]) {
                    coinsRateMobTable[index].classList.remove(
                        "coins-rate_plus"
                    );
                }
            }
            coinsRateSlide[index].classList.add("coins-rate_minus");
            coinsRateDesktopTable[index].classList.add("coins-rate_minus");
            if (coinsRateMobTable[index]) {
                coinsRateMobTable[index].classList.add("coins-rate_minus");
            }
        } else {
            if (coinsRateSlide[index].classList.contains("coins-rate_minus")) {
                coinsRateSlide[index].classList.remove("coins-rate_minus");
                coinsRateDesktopTable[index].classList.remove(
                    "coins-rate_minus"
                );
                if (coinsRateMobTable[index]) {
                    coinsRateMobTable[index].classList.remove(
                        "coins-rate_minus"
                    );
                }
            }
            coinsRateSlide[index].classList.add("coins-rate_plus");
            coinsRateDesktopTable[index].classList.add("coins-rate_plus");
            if (coinsRateMobTable[index]) {
                coinsRateMobTable[index].classList.add("coins-rate_plus");
            }
        }
    };

    const rendersData = (data) => {
        data.forEach((item, index) => {
            updateCurrencyData(item, index);
        });
    };

    const getCtx = (data) => {
        data.forEach((item, index) => {
            ctx[index] = document
                .getElementById(item.currencyID.toLowerCase())
                .getContext("2d");
        });

        return ctx;
    };

    const createChart = (ctx, id, data, isGreen) => {
        const totalDuration = 1000;
        const delayBetweenPoints = totalDuration / data.length;
        const previousY = (ctx) =>
            ctx.index === 0 ?
            ctx.chart.scales.y.getPixelForValue(100) :
            ctx.chart
            .getDatasetMeta(ctx.datasetIndex)
            .data[ctx.index - 1].getProps(["y"], true).y;
        const animation = {
            x: {
                type: "number",
                easing: "linear",
                duration: delayBetweenPoints,
                from: NaN, // the point is initially skipped
                delay(ctx) {
                    if (ctx.type !== "data" || ctx.xStarted) {
                        return 0;
                    }
                    ctx.xStarted = true;
                    return ctx.index * delayBetweenPoints;
                },
            },
            y: {
                type: "number",
                easing: "linear",
                duration: delayBetweenPoints,
                from: previousY,
                delay(ctx) {
                    if (ctx.type !== "data" || ctx.yStarted) {
                        return 0;
                    }
                    ctx.yStarted = true;
                    return ctx.index * delayBetweenPoints;
                },
            },
        };

        chartArr[id] = new Chart(ctx, {
            type: "line",
            data: {
                datasets: [{
                    borderColor: isGreen ? "#27ae60" : "#eb5757",
                    borderWidth: 1,
                    radius: 0,
                    data: data,
                }, ],
            },
            options: {
                animation,
                events: [],
                interaction: {
                    intersect: false,
                },
                plugins: {
                    legend: false,
                },
                scales: {
                    x: {
                        type: "linear",
                        display: false,
                    },
                    y: {
                        display: false,
                    },
                },
            },
        });
    };

    const loadRendersData = async() => {
        if (сurrencyData.length !== 0) {
            const dataCoins = getDataCoins(requestURLCurrency, сurrencyData);
            const dataCurrencyPriceHistory = getCurrencyPriceHistory(
                requestURLPriceHistory,
                сurrencyData
            );

            const [mainData, currencyPriceHistory] = await Promise.all([
                dataCoins,
                dataCurrencyPriceHistory,
            ]);

            const sortedCurrencyPriceHistory = mainData.map((a, index) => {
                if (currencyPriceHistory[index].find((x) => x === a.last)) {
                    return currencyPriceHistory[index];
                }

                return currencyPriceHistory[index];
            });

            const newCurrencyData = сurrencyData.reduce(
                (items, item, index) => {
                    if (item.currencyID === mainData[index].symbol) {
                        let openPrice = +mainData[index].open;
                        let lastPrice = +mainData[index].last;
                        let priceDifference =
                            ((lastPrice - openPrice) / openPrice) * 100;

                        return [
                            ...items,
                            {
                                ...item,
                                price: lastPrice.toFixed(2),
                                difference: priceDifference.toFixed(2),
                                currencyPriceHistory: sortedCurrencyPriceHistory[index],
                            },
                        ];
                    }

                    return [...items, {...item }];
                }, []
            );

            rendersData(newCurrencyData);

            if (chartArr.length === 0) {
                getCtx(newCurrencyData).forEach((ctx, id) => {
                    let { currencyPriceHistory } = newCurrencyData[id];

                    let dataChart = currencyPriceHistory.reduce(
                        (items, item, index) => {
                            return [...items, { x: index, y: item }];
                        }, []
                    );

                    var coinRates = document.querySelectorAll(
                        `.coinschart .coins-rate-table-desktop-num`
                    );
                    // If first character is '+' the chart should be green. Example: '+1.34%'
                    var isGreen =
                        coinRates &&
                        coinRates[id] &&
                        coinRates[id].innerHTML[0] === "+";
                    createChart(ctx, id, dataChart, isGreen);
                });
            } else {
                chartArr.forEach((chart, index) => {
                    let { currencyPriceHistory } = newCurrencyData[index];

                    let dataChart = currencyPriceHistory.reduce(
                        (items, item, index) => {
                            return [...items, { x: index, y: item }];
                        }, []
                    );

                    chart.data.datasets[0].data = dataChart;
                    chart.update();
                });
            }
        }
    };

    loadRendersData();

    if (сurrencyData.length !== 0) {
        setInterval(loadRendersData, 10000);
    }
}

function initDropdown() {
    const triggers = document.querySelectorAll(
        ".menu-dropdown-item, .js-toggle"
    );
    triggers.forEach(function(trigger) {
        trigger.addEventListener("click", function(e) {
            // Не переходим по ссылке
            if (e.target.parentElement === trigger) {
                e.preventDefault();
            }

            // Добавляем/убираем класс "active"
            trigger.classList.toggle("active");

            // Закрываем остальные выпадашки
            var siblings = trigger.parentElement.children;
            for (var elem of siblings) {
                if (elem !== trigger) {
                    elem.classList.remove("active");
                }
            }
        });
    });
}