var Dashboard = function () {
  var e = function (e, t, a, r) {
      if (0 != e.length) {
        var o = {
          type: "line",
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
            datasets: [{
              label: "",
              borderColor: a,
              borderWidth: r,
              pointHoverRadius: 4,
              pointHoverBorderWidth: 12,
              pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
              pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
              pointHoverBackgroundColor: mApp.getColor("danger"),
              pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
              fill: !1,
              data: t
            }]
          },
          options: {
            title: {
              display: !1
            },
            tooltips: {
              enabled: !1,
              intersect: !1,
              mode: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10
            },
            legend: {
              display: !1,
              labels: {
                usePointStyle: !1
              }
            },
            responsive: !0,
            maintainAspectRatio: !0,
            hover: {
              mode: "index"
            },
            scales: {
              xAxes: [{
                display: !1,
                gridLines: !1,
                scaleLabel: {
                  display: !0,
                  labelString: "Month"
                }
              }],
              yAxes: [{
                display: !1,
                gridLines: !1,
                scaleLabel: {
                  display: !0,
                  labelString: "Value"
                },
                ticks: {
                  beginAtZero: !0
                }
              }]
            },
            elements: {
              point: {
                radius: 4,
                borderWidth: 12
              }
            },
            layout: {
              padding: {
                left: 0,
                right: 10,
                top: 5,
                bottom: 0
              }
            }
          }
        };
        return new Chart(e, o)
      }
    },
    t = function () {
      var e = function () {
        if (0 != $("#m_chart_personal_income_quater_1").length) {
          var e = new Chartist.Pie("#m_chart_personal_income_quater_1", {
            series: [{
              value: 32,
              className: "custom",
              meta: {
                color: mApp.getColor("accent")
              }
            }, {
              value: 32,
              className: "custom",
              meta: {
                color: mApp.getColor("warning")
              }
            }, {
              value: 36,
              className: "custom",
              meta: {
                color: mApp.getColor("brand")
              }
            }],
            labels: [1, 2, 3]
          }, {
            donut: !0,
            donutWidth: 17,
            showLabel: !1
          });
          e.on("draw", function (e) {
            if ("slice" === e.type) {
              var t = e.element._node.getTotalLength();
              e.element.attr({
                "stroke-dasharray": t + "px " + t + "px"
              });
              var a = {
                "stroke-dashoffset": {
                  id: "anim" + e.index,
                  dur: 1e3,
                  from: -t + "px",
                  to: "0px",
                  easing: Chartist.Svg.Easing.easeOutQuint,
                  fill: "freeze",
                  stroke: e.meta.color
                }
              };
              0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                "stroke-dashoffset": -t + "px",
                stroke: e.meta.color
              }), e.element.animate(a, !1)
            }
          }), e.on("created", function () {
            window.__anim21278907124 && (clearTimeout(window.__anim21278907124), window.__anim21278907124 = null), window.__anim21278907124 = setTimeout(e.update.bind(e), 15e3)
          })
        }
      };
      e(), $(document).find('a[data-toggle="pill"]').on("shown.bs.tab", function (t) {
        switch ($(t.target).attr("href")) {
        case "#m_personal_income_quater_1":
          e();
          break;
        case "#m_personal_income_quater_2":
          ! function () {
            if (0 != $("#m_chart_personal_income_quater_2").length) {
              var e = new Chartist.Pie("#m_chart_personal_income_quater_2", {
                series: [{
                  value: 22,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("focus")
                  }
                }, {
                  value: 44,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("success")
                  }
                }, {
                  value: 34,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("danger")
                  }
                }],
                labels: [1, 2, 3]
              }, {
                donut: !0,
                donutWidth: 17,
                showLabel: !1
              });
              e.on("draw", function (e) {
                if ("slice" === e.type) {
                  var t = e.element._node.getTotalLength();
                  e.element.attr({
                    "stroke-dasharray": t + "px " + t + "px"
                  });
                  var a = {
                    "stroke-dashoffset": {
                      id: "anim" + e.index,
                      dur: 1e3,
                      from: -t + "px",
                      to: "0px",
                      easing: Chartist.Svg.Easing.easeOutQuint,
                      fill: "freeze",
                      stroke: e.meta.color
                    }
                  };
                  0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                    "stroke-dashoffset": -t + "px",
                    stroke: e.meta.color
                  }), e.element.animate(a, !1)
                }
              }), e.on("created", function () {
                window.__anim212789071241111 && (clearTimeout(window.__anim212789071241111), window.__anim212789071241111 = null), window.__anim212789071241111 = setTimeout(e.update.bind(e), 15e3)
              })
            }
          }();
          break;
        case "#m_personal_income_quater_3":
          ! function () {
            if (0 != $("#m_chart_personal_income_quater_3").length) {
              var e = new Chartist.Pie("#m_chart_personal_income_quater_3", {
                series: [{
                  value: 47,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("info")
                  }
                }, {
                  value: 55,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("danger")
                  }
                }, {
                  value: 27,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("brand")
                  }
                }],
                labels: [1, 2, 3]
              }, {
                donut: !0,
                donutWidth: 17,
                showLabel: !1
              });
              e.on("draw", function (e) {
                if ("slice" === e.type) {
                  var t = e.element._node.getTotalLength();
                  e.element.attr({
                    "stroke-dasharray": t + "px " + t + "px"
                  });
                  var a = {
                    "stroke-dashoffset": {
                      id: "anim" + e.index,
                      dur: 1e3,
                      from: -t + "px",
                      to: "0px",
                      easing: Chartist.Svg.Easing.easeOutQuint,
                      fill: "freeze",
                      stroke: e.meta.color
                    }
                  };
                  0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                    "stroke-dashoffset": -t + "px",
                    stroke: e.meta.color
                  }), e.element.animate(a, !1)
                }
              }), e.on("created", function () {
                window.__anim212789071241111 && (clearTimeout(window.__anim212789071241111), window.__anim212789071241111 = null), window.__anim212789071241111 = setTimeout(e.update.bind(e), 15e3)
              })
            }
          }();
          break;
        case "#m_personal_income_quater_4":
          ! function () {
            if (0 != $("#m_chart_personal_income_quater_4").length) {
              var e = new Chartist.Pie("#m_chart_personal_income_quater_4", {
                series: [{
                  value: 37,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("warning")
                  }
                }, {
                  value: 65,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("primary")
                  }
                }, {
                  value: 33,
                  className: "custom",
                  meta: {
                    color: mApp.getColor("danger")
                  }
                }],
                labels: [1, 2, 3]
              }, {
                donut: !0,
                donutWidth: 17,
                showLabel: !1
              });
              e.on("draw", function (e) {
                if ("slice" === e.type) {
                  var t = e.element._node.getTotalLength();
                  e.element.attr({
                    "stroke-dasharray": t + "px " + t + "px"
                  });
                  var a = {
                    "stroke-dashoffset": {
                      id: "anim" + e.index,
                      dur: 1e3,
                      from: -t + "px",
                      to: "0px",
                      easing: Chartist.Svg.Easing.easeOutQuint,
                      fill: "freeze",
                      stroke: e.meta.color
                    }
                  };
                  0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                    "stroke-dashoffset": -t + "px",
                    stroke: e.meta.color
                  }), e.element.animate(a, !1)
                }
              }), e.on("created", function () {
                window.__anim212789071241111 && (clearTimeout(window.__anim212789071241111), window.__anim212789071241111 = null), window.__anim212789071241111 = setTimeout(e.update.bind(e), 15e3)
              })
            }
          }()
        }
      })
    };
  return {
    init: function () {
      var a, r;
      ! function () {
        var e = $("#m_chart_daily_sales");
        if (0 != e.length) {
          var t = {
            labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5", "Label 6", "Label 7", "Label 8", "Label 9", "Label 10", "Label 11", "Label 12", "Label 13", "Label 14", "Label 15", "Label 16"],
            datasets: [{
              backgroundColor: mApp.getColor("success"),
              data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20, 15, 10, 15, 20]
            }, {
              backgroundColor: "#f3f3fb",
              data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20, 15, 10, 15, 20]
            }]
          };
          new Chart(e, {
            type: "bar",
            data: t,
            options: {
              title: {
                display: !1
              },
              tooltips: {
                intersect: !1,
                mode: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
              },
              legend: {
                display: !1
              },
              responsive: !0,
              maintainAspectRatio: !1,
              barRadius: 4,
              scales: {
                xAxes: [{
                  display: !1,
                  gridLines: !1,
                  stacked: !0
                }],
                yAxes: [{
                  display: !1,
                  stacked: !0,
                  gridLines: !1
                }]
              },
              layout: {
                padding: {
                  left: 0,
                  right: 0,
                  top: 0,
                  bottom: 0
                }
              }
            }
          })
        }
      }(), 0 != $("#m_chart_profit_share").length && new Chartist.Pie("#m_chart_profit_share", {
          series: [{
            value: 32,
            className: "custom",
            meta: {
              color: mApp.getColor("brand")
            }
          }, {
            value: 32,
            className: "custom",
            meta: {
              color: mApp.getColor("accent")
            }
          }, {
            value: 36,
            className: "custom",
            meta: {
              color: mApp.getColor("warning")
            }
          }],
          labels: [1, 2, 3]
        }, {
          donut: !0,
          donutWidth: 17,
          showLabel: !1
        }).on("draw", function (e) {
          if ("slice" === e.type) {
            var t = e.element._node.getTotalLength();
            e.element.attr({
              "stroke-dasharray": t + "px " + t + "px"
            });
            var a = {
              "stroke-dashoffset": {
                id: "anim" + e.index,
                dur: 1e3,
                from: -t + "px",
                to: "0px",
                easing: Chartist.Svg.Easing.easeOutQuint,
                fill: "freeze",
                stroke: e.meta.color
              }
            };
            0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
              "stroke-dashoffset": -t + "px",
              stroke: e.meta.color
            }), e.element.animate(a, !1)
          }
        }),
        function () {
          if (0 != $("#m_chart_sales_stats").length) {
            var e = {
              type: "line",
              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "January", "February", "March", "April"],
                datasets: [{
                  label: "Sales Stats",
                  borderColor: mApp.getColor("brand"),
                  borderWidth: 2,
                  pointBackgroundColor: mApp.getColor("brand"),
                  backgroundColor: mApp.getColor("accent"),
                  pointHoverBackgroundColor: mApp.getColor("danger"),
                  pointHoverBorderColor: Chart.helpers.color(mApp.getColor("danger")).alpha(.2).rgbString(),
                  data: [10, 20, 16, 18, 12, 40, 35, 30, 33, 34, 45, 40, 60, 55, 70, 65, 75, 62]
                }]
              },
              options: {
                title: {
                  display: !1
                },
                tooltips: {
                  intersect: !1,
                  mode: "nearest",
                  xPadding: 10,
                  yPadding: 10,
                  caretPadding: 10
                },
                legend: {
                  display: !1,
                  labels: {
                    usePointStyle: !1
                  }
                },
                responsive: !0,
                maintainAspectRatio: !1,
                hover: {
                  mode: "index"
                },
                scales: {
                  xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Month"
                    }
                  }],
                  yAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Value"
                    }
                  }]
                },
                elements: {
                  point: {
                    radius: 3,
                    borderWidth: 0,
                    hoverRadius: 8,
                    hoverBorderWidth: 2
                  }
                }
              }
            };
            new Chart($("#m_chart_sales_stats"), e)
          }
        }(), e($("#m_chart_sales_by_apps_1_1"), [10, 20, -5, 8, -20, -2, -4, 15, 5, 8], mApp.getColor("accent"), 2), e($("#m_chart_sales_by_apps_1_2"), [2, 16, 0, 12, 22, 5, -10, 5, 15, 2], mApp.getColor("danger"), 2), e($("#m_chart_sales_by_apps_1_3"), [15, 5, -10, 5, 16, 22, 6, -6, -12, 5], mApp.getColor("success"), 2), e($("#m_chart_sales_by_apps_1_4"), [8, 18, -12, 12, 22, -2, -14, 16, 18, 2], mApp.getColor("warning"), 2), e($("#m_chart_sales_by_apps_2_1"), [10, 20, -5, 8, -20, -2, -4, 15, 5, 8], mApp.getColor("danger"), 2), e($("#m_chart_sales_by_apps_2_2"), [2, 16, 0, 12, 22, 5, -10, 5, 15, 2], mApp.getColor("metal"), 2), e($("#m_chart_sales_by_apps_2_3"), [15, 5, -10, 5, 16, 22, 6, -6, -12, 5], mApp.getColor("brand"), 2), e($("#m_chart_sales_by_apps_2_4"), [8, 18, -12, 12, 22, -2, -14, 16, 18, 2], mApp.getColor("info"), 2),
        function () {
          if (0 != $("#m_chart_latest_updates").length) {
            var e = document.getElementById("m_chart_latest_updates").getContext("2d"),
              t = {
                type: "line",
                data: {
                  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                  datasets: [{
                    label: "Sales Stats",
                    backgroundColor: mApp.getColor("danger"),
                    borderColor: mApp.getColor("danger"),
                    pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                    pointHoverBackgroundColor: mApp.getColor("accent"),
                    pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                    data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                  }]
                },
                options: {
                  title: {
                    display: !1
                  },
                  tooltips: {
                    intersect: !1,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                  },
                  legend: {
                    display: !1
                  },
                  responsive: !0,
                  maintainAspectRatio: !1,
                  hover: {
                    mode: "index"
                  },
                  scales: {
                    xAxes: [{
                      display: !1,
                      gridLines: !1,
                      scaleLabel: {
                        display: !0,
                        labelString: "Month"
                      }
                    }],
                    yAxes: [{
                      display: !1,
                      gridLines: !1,
                      scaleLabel: {
                        display: !0,
                        labelString: "Value"
                      },
                      ticks: {
                        beginAtZero: !0
                      }
                    }]
                  },
                  elements: {
                    line: {
                      tension: 1e-7
                    },
                    point: {
                      radius: 4,
                      borderWidth: 12
                    }
                  }
                }
              };
            new Chart(e, t)
          }
        }(),
        function () {
          if (0 != $("#m_chart_trends_stats").length) {
            var e = document.getElementById("m_chart_trends_stats").getContext("2d"),
              t = e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#00c5dc").alpha(.7).rgbString()), t.addColorStop(1, Chart.helpers.color("#f2feff").alpha(0).rgbString());
            var a = {
              type: "line",
              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
                datasets: [{
                  label: "Sales Stats",
                  backgroundColor: t,
                  borderColor: "#0dc8de",
                  pointBackgroundColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(),
                  pointBorderColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(),
                  pointHoverBackgroundColor: mApp.getColor("danger"),
                  pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.2).rgbString(),
                  data: [20, 10, 18, 15, 26, 18, 15, 22, 16, 12, 12, 13, 10, 18, 14, 24, 16, 12, 19, 21, 16, 14, 21, 21, 13, 15, 22, 24, 21, 11, 14, 19, 21, 17]
                }]
              },
              options: {
                title: {
                  display: !1
                },
                tooltips: {
                  intersect: !1,
                  mode: "nearest",
                  xPadding: 10,
                  yPadding: 10,
                  caretPadding: 10
                },
                legend: {
                  display: !1
                },
                responsive: !0,
                maintainAspectRatio: !1,
                hover: {
                  mode: "index"
                },
                scales: {
                  xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Month"
                    }
                  }],
                  yAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Value"
                    },
                    ticks: {
                      beginAtZero: !0
                    }
                  }]
                },
                elements: {
                  line: {
                    tension: .19
                  },
                  point: {
                    radius: 4,
                    borderWidth: 12
                  }
                },
                layout: {
                  padding: {
                    left: 0,
                    right: 0,
                    top: 5,
                    bottom: 0
                  }
                }
              }
            };
            new Chart(e, a)
          }
        }(),
        function () {
          if (0 != $("#m_chart_trends_stats_2").length) {
            var e = document.getElementById("m_chart_trends_stats_2").getContext("2d"),
              t = {
                type: "line",
                data: {
                  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
                  datasets: [{
                    label: "Sales Stats",
                    backgroundColor: "#d2f5f9",
                    borderColor: mApp.getColor("brand"),
                    pointBackgroundColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color("#ffffff").alpha(0).rgbString(),
                    pointHoverBackgroundColor: mApp.getColor("danger"),
                    pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.2).rgbString(),
                    data: [20, 10, 18, 15, 32, 18, 15, 22, 8, 6, 12, 13, 10, 18, 14, 24, 16, 12, 19, 21, 16, 14, 24, 21, 13, 15, 27, 29, 21, 11, 14, 19, 21, 17]
                  }]
                },
                options: {
                  title: {
                    display: !1
                  },
                  tooltips: {
                    intersect: !1,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                  },
                  legend: {
                    display: !1
                  },
                  responsive: !0,
                  maintainAspectRatio: !1,
                  hover: {
                    mode: "index"
                  },
                  scales: {
                    xAxes: [{
                      display: !1,
                      gridLines: !1,
                      scaleLabel: {
                        display: !0,
                        labelString: "Month"
                      }
                    }],
                    yAxes: [{
                      display: !1,
                      gridLines: !1,
                      scaleLabel: {
                        display: !0,
                        labelString: "Value"
                      },
                      ticks: {
                        beginAtZero: !0
                      }
                    }]
                  },
                  elements: {
                    line: {
                      tension: .19
                    },
                    point: {
                      radius: 4,
                      borderWidth: 12
                    }
                  },
                  layout: {
                    padding: {
                      left: 0,
                      right: 0,
                      top: 5,
                      bottom: 0
                    }
                  }
                }
              };
            new Chart(e, t)
          }
        }(),
        function () {
          if (0 != $("#m_chart_latest_trends_map").length) try {
            new GMaps({
              div: "#m_chart_latest_trends_map",
              lat: -12.043333,
              lng: -77.028333
            })
          } catch (e) {
            console.log(e)
          }
        }(), 0 != $("#m_chart_revenue_change").length && Morris.Donut({
          element: "m_chart_revenue_change",
          data: [{
            label: "New York",
            value: 10
          }, {
            label: "London",
            value: 7
          }, {
            label: "Paris",
            value: 20
          }],
          colors: [mApp.getColor("accent"), mApp.getColor("danger"), mApp.getColor("brand")]
        }), 0 != $("#m_chart_support_tickets").length && Morris.Donut({
          element: "m_chart_support_tickets",
          data: [{
            label: "Margins",
            value: 20
          }, {
            label: "Profit",
            value: 70
          }, {
            label: "Lost",
            value: 10
          }],
          labelColor: "#a7a7c2",
          colors: [mApp.getColor("accent"), mApp.getColor("brand"), mApp.getColor("danger")]
        }), 0 != $("#m_chart_support_tickets2").length && new Chartist.Pie("#m_chart_support_tickets2", {
          series: [{
            value: 32,
            className: "custom",
            meta: {
              color: mApp.getColor("brand")
            }
          }, {
            value: 32,
            className: "custom",
            meta: {
              color: mApp.getColor("accent")
            }
          }, {
            value: 36,
            className: "custom",
            meta: {
              color: mApp.getColor("warning")
            }
          }],
          labels: [1, 2, 3]
        }, {
          donut: !0,
          donutWidth: 17,
          showLabel: !1
        }).on("draw", function (e) {
          if ("slice" === e.type) {
            var t = e.element._node.getTotalLength();
            e.element.attr({
              "stroke-dasharray": t + "px " + t + "px"
            });
            var a = {
              "stroke-dashoffset": {
                id: "anim" + e.index,
                dur: 1e3,
                from: -t + "px",
                to: "0px",
                easing: Chartist.Svg.Easing.easeOutQuint,
                fill: "freeze",
                stroke: e.meta.color
              }
            };
            0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
              "stroke-dashoffset": -t + "px",
              stroke: e.meta.color
            }), e.element.animate(a, !1)
          }
        }),
        function () {
          if (0 != $("#m_chart_activities").length) {
            var e = document.getElementById("m_chart_activities").getContext("2d"),
              t = e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#e14c86").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#e14c86").alpha(.3).rgbString());
            var a = {
              type: "line",
              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                datasets: [{
                  label: "Sales Stats",
                  backgroundColor: t,
                  borderColor: "#e13a58",
                  pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointHoverBackgroundColor: mApp.getColor("light"),
                  pointHoverBorderColor: Chart.helpers.color("#ffffff").alpha(.1).rgbString(),
                  data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                }]
              },
              options: {
                title: {
                  display: !1
                },
                tooltips: {
                  mode: "nearest",
                  intersect: !1,
                  position: "nearest",
                  xPadding: 10,
                  yPadding: 10,
                  caretPadding: 10
                },
                legend: {
                  display: !1
                },
                responsive: !0,
                maintainAspectRatio: !1,
                scales: {
                  xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Month"
                    }
                  }],
                  yAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Value"
                    },
                    ticks: {
                      beginAtZero: !0
                    }
                  }]
                },
                elements: {
                  line: {
                    tension: 1e-7
                  },
                  point: {
                    radius: 4,
                    borderWidth: 12
                  }
                },
                layout: {
                  padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                  }
                }
              }
            };
            new Chart(e, a)
          }
        }(),
        function () {
          if (0 != $("#m_chart_bandwidth1").length) {
            var e = document.getElementById("m_chart_bandwidth1").getContext("2d"),
              t = e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#d1f1ec").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#d1f1ec").alpha(.3).rgbString());
            var a = {
              type: "line",
              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                datasets: [{
                  label: "Bandwidth Stats",
                  backgroundColor: t,
                  borderColor: mApp.getColor("success"),
                  pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointHoverBackgroundColor: mApp.getColor("danger"),
                  pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                  data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                }]
              },
              options: {
                title: {
                  display: !1
                },
                tooltips: {
                  mode: "nearest",
                  intersect: !1,
                  position: "nearest",
                  xPadding: 10,
                  yPadding: 10,
                  caretPadding: 10
                },
                legend: {
                  display: !1
                },
                responsive: !0,
                maintainAspectRatio: !1,
                scales: {
                  xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Month"
                    }
                  }],
                  yAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Value"
                    },
                    ticks: {
                      beginAtZero: !0
                    }
                  }]
                },
                elements: {
                  line: {
                    tension: 1e-7
                  },
                  point: {
                    radius: 4,
                    borderWidth: 12
                  }
                },
                layout: {
                  padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                  }
                }
              }
            };
            new Chart(e, a)
          }
        }(),
        function () {
          if (0 != $("#m_chart_bandwidth2").length) {
            var e = document.getElementById("m_chart_bandwidth2").getContext("2d"),
              t = e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#ffefce").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#ffefce").alpha(.3).rgbString());
            var a = {
              type: "line",
              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                datasets: [{
                  label: "Bandwidth Stats",
                  backgroundColor: t,
                  borderColor: mApp.getColor("warning"),
                  pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointHoverBackgroundColor: mApp.getColor("danger"),
                  pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                  data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                }]
              },
              options: {
                title: {
                  display: !1
                },
                tooltips: {
                  mode: "nearest",
                  intersect: !1,
                  position: "nearest",
                  xPadding: 10,
                  yPadding: 10,
                  caretPadding: 10
                },
                legend: {
                  display: !1
                },
                responsive: !0,
                maintainAspectRatio: !1,
                scales: {
                  xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Month"
                    }
                  }],
                  yAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Value"
                    },
                    ticks: {
                      beginAtZero: !0
                    }
                  }]
                },
                elements: {
                  line: {
                    tension: 1e-7
                  },
                  point: {
                    radius: 4,
                    borderWidth: 12
                  }
                },
                layout: {
                  padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                  }
                }
              }
            };
            new Chart(e, a)
          }
        }(),
        function () {
          if (0 != $("#m_chart_adwords_stats").length) {
            var e = document.getElementById("m_chart_adwords_stats").getContext("2d"),
              t = e.createLinearGradient(0, 0, 0, 240);
            t.addColorStop(0, Chart.helpers.color("#ffefce").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#ffefce").alpha(.3).rgbString());
            var a = {
              type: "line",
              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                datasets: [{
                  label: "AdWord Clicks",
                  backgroundColor: mApp.getColor("brand"),
                  borderColor: mApp.getColor("brand"),
                  pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointHoverBackgroundColor: mApp.getColor("danger"),
                  pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                  data: [12, 16, 9, 18, 13, 12, 18, 12, 15, 17]
                }, {
                  label: "AdWords Views",
                  backgroundColor: mApp.getColor("accent"),
                  borderColor: mApp.getColor("accent"),
                  pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                  pointHoverBackgroundColor: mApp.getColor("danger"),
                  pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                  data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                }]
              },
              options: {
                title: {
                  display: !1
                },
                tooltips: {
                  mode: "nearest",
                  intersect: !1,
                  position: "nearest",
                  xPadding: 10,
                  yPadding: 10,
                  caretPadding: 10
                },
                legend: {
                  display: !1
                },
                responsive: !0,
                maintainAspectRatio: !1,
                scales: {
                  xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Month"
                    }
                  }],
                  yAxes: [{
                    stacked: !0,
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                      display: !0,
                      labelString: "Value"
                    },
                    ticks: {
                      beginAtZero: !0
                    }
                  }]
                },
                elements: {
                  line: {
                    tension: 1e-7
                  },
                  point: {
                    radius: 4,
                    borderWidth: 12
                  }
                },
                layout: {
                  padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                  }
                }
              }
            };
            new Chart(e, a)
          }
        }(),
        function () {
          if (0 != $("#m_chart_finance_summary").length) {
            var e = document.getElementById("m_chart_finance_summary").getContext("2d"),
              t = {
                type: "line",
                data: {
                  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                  datasets: [{
                    label: "AdWords Views",
                    backgroundColor: mApp.getColor("accent"),
                    borderColor: mApp.getColor("accent"),
                    pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                    pointHoverBackgroundColor: mApp.getColor("danger"),
                    pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                    data: [10, 14, 12, 16, 9, 11, 13, 9, 13, 15]
                  }]
                },
                options: {
                  title: {
                    display: !1
                  },
                  tooltips: {
                    mode: "nearest",
                    intersect: !1,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                  },
                  legend: {
                    display: !1
                  },
                  responsive: !0,
                  maintainAspectRatio: !1,
                  scales: {
                    xAxes: [{
                      display: !1,
                      gridLines: !1,
                      scaleLabel: {
                        display: !0,
                        labelString: "Month"
                      }
                    }],
                    yAxes: [{
                      display: !1,
                      gridLines: !1,
                      scaleLabel: {
                        display: !0,
                        labelString: "Value"
                      },
                      ticks: {
                        beginAtZero: !0
                      }
                    }]
                  },
                  elements: {
                    line: {
                      tension: 1e-7
                    },
                    point: {
                      radius: 4,
                      borderWidth: 12
                    }
                  },
                  layout: {
                    padding: {
                      left: 0,
                      right: 0,
                      top: 10,
                      bottom: 0
                    }
                  }
                }
              };
            new Chart(e, t)
          }
        }(), e($("#m_chart_quick_stats_1"), [10, 14, 18, 11, 9, 12, 14, 17, 18, 14], mApp.getColor("brand"), 3), e($("#m_chart_quick_stats_2"), [11, 12, 18, 13, 11, 12, 15, 13, 19, 15], mApp.getColor("danger"), 3), e($("#m_chart_quick_stats_3"), [12, 12, 18, 11, 15, 12, 13, 16, 11, 18], mApp.getColor("success"), 3), e($("#m_chart_quick_stats_4"), [11, 9, 13, 18, 13, 15, 14, 13, 18, 15], mApp.getColor("accent"), 3), t(),
        function () {
          if (0 != $("#m_dashboard_daterangepicker").length) {
            var e = $("#m_dashboard_daterangepicker"),
              t = moment(),
              a = moment();
            e.daterangepicker({
              direction: mUtil.isRTL(),
              startDate: t,
              endDate: a,
              opens: "left",
              ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
              }
            }, r), r(t, a, "")
          }

          function r(t, a, r) {
            var o = "",
              n = "";
            a - t < 100 || "Today" == r ? (o = "Today:", n = t.format("MMM D")) : "Yesterday" == r ? (o = "Yesterday:", n = t.format("MMM D")) : n = t.format("MMM D") + " - " + a.format("MMM D"), e.find(".m-subheader__daterange-date").html(n), e.find(".m-subheader__daterange-title").html(o)
          }
        }(), 0 !== $("#m_datatable_latest_orders").length && $(".m_datatable").mDatatable({
          data: {
            type: "remote",
            source: {
              read: {
                url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php"
              }
            },
            pageSize: 10,
            saveState: {
              cookie: !1,
              webstorage: !0
            },
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0
          },
          layout: {
            theme: "default",
            class: "",
            scroll: !0,
            height: 380,
            footer: !1
          },
          sortable: !0,
          filterable: !1,
          pagination: !0,
          columns: [{
            field: "RecordID",
            title: "#",
            sortable: !1,
            width: 40,
            selector: {
              class: "m-checkbox--solid m-checkbox--brand"
            },
            textAlign: "center"
          }, {
            field: "OrderID",
            title: "Order ID",
            sortable: "asc",
            filterable: !1,
            width: 150,
            template: "{{OrderID}} - {{ShipCountry}}"
          }, {
            field: "ShipName",
            title: "Ship Name",
            width: 150,
            responsive: {
              visible: "lg"
            }
          }, {
            field: "ShipDate",
            title: "Ship Date"
          }, {
            field: "Status",
            title: "Status",
            width: 100,
            template: function (e) {
              var t = {
                1: {
                  title: "Pending",
                  class: "m-badge--brand"
                },
                2: {
                  title: "Delivered",
                  class: " m-badge--metal"
                },
                3: {
                  title: "Canceled",
                  class: " m-badge--primary"
                },
                4: {
                  title: "Success",
                  class: " m-badge--success"
                },
                5: {
                  title: "Info",
                  class: " m-badge--info"
                },
                6: {
                  title: "Danger",
                  class: " m-badge--danger"
                },
                7: {
                  title: "Warning",
                  class: " m-badge--warning"
                }
              };
              return '<span class="m-badge ' + t[e.Status].class + ' m-badge--wide">' + t[e.Status].title + "</span>"
            }
          }, {
            field: "Type",
            title: "Type",
            width: 100,
            template: function (e) {
              var t = {
                1: {
                  title: "Online",
                  state: "danger"
                },
                2: {
                  title: "Retail",
                  state: "primary"
                },
                3: {
                  title: "Direct",
                  state: "accent"
                }
              };
              return '<span class="m-badge m-badge--' + t[e.Type].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + t[e.Type].state + '">' + t[e.Type].title + "</span>"
            }
          }, {
            field: "Actions",
            width: 110,
            title: "Actions",
            sortable: !1,
            overflow: "visible",
            template: function (e, t, a) {
              return '                        <div class="dropdown ' + (a.getPageSize() - t <= 4 ? "dropup" : "") + '">                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </div>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">                            <i class="la la-edit"></i>                        </a>                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">                            <i class="la la-trash"></i>                        </a>                    '
            }
          }]
        }),
        function () {
          if (0 !== $("#m_calendar").length) {
            var e = moment().startOf("day");
            e.format("YYYY-MM"), e.clone().subtract(1, "day").format("YYYY-MM-DD"), e.format("YYYY-MM-DD"), e.clone().add(1, "day").format("YYYY-MM-DD"), $("#m_calendar").fullCalendar({
              isRTL: mUtil.isRTL(),
              header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay,listWeek"
              },
              editable: !0,
              eventLimit: !0,
              navLinks: !0,
              defaultDate: moment("2017-09-15"),
              events: [{
                title: "Meeting",
                start: moment("2017-08-28"),
                description: "Lorem ipsum dolor sit incid idunt ut",
                className: "m-fc-event--light m-fc-event--solid-warning"
              }, {
                title: "Conference",
                description: "Lorem ipsum dolor incid idunt ut labore",
                start: moment("2017-08-29T13:30:00"),
                end: moment("2017-08-29T17:30:00"),
                className: "m-fc-event--accent"
              }, {
                title: "Dinner",
                start: moment("2017-08-30"),
                description: "Lorem ipsum dolor sit tempor incid",
                className: "m-fc-event--light  m-fc-event--solid-danger"
              }, {
                title: "All Day Event",
                start: moment("2017-09-01"),
                description: "Lorem ipsum dolor sit incid idunt ut",
                className: "m-fc-event--danger m-fc-event--solid-focus"
              }, {
                title: "Reporting",
                description: "Lorem ipsum dolor incid idunt ut labore",
                start: moment("2017-09-03T13:30:00"),
                end: moment("2017-09-04T17:30:00"),
                className: "m-fc-event--accent"
              }, {
                title: "Company Trip",
                start: moment("2017-09-05"),
                end: moment("2017-09-07"),
                description: "Lorem ipsum dolor sit tempor incid",
                className: "m-fc-event--primary"
              }, {
                title: "ICT Expo 2017 - Product Release",
                start: moment("2017-09-09"),
                description: "Lorem ipsum dolor sit tempor inci",
                className: "m-fc-event--light m-fc-event--solid-primary"
              }, {
                title: "Dinner",
                start: moment("2017-09-12"),
                description: "Lorem ipsum dolor sit amet, conse ctetur"
              }, {
                id: 999,
                title: "Repeating Event",
                start: moment("2017-09-15T16:00:00"),
                description: "Lorem ipsum dolor sit ncididunt ut labore",
                className: "m-fc-event--danger"
              }, {
                id: 1e3,
                title: "Repeating Event",
                description: "Lorem ipsum dolor sit amet, labore",
                start: moment("2017-09-18T19:00:00")
              }, {
                title: "Conference",
                start: moment("2017-09-20T13:00:00"),
                end: moment("2017-09-21T19:00:00"),
                description: "Lorem ipsum dolor eius mod tempor labore",
                className: "m-fc-event--accent"
              }, {
                title: "Meeting",
                start: moment("2017-09-11"),
                description: "Lorem ipsum dolor eiu idunt ut labore"
              }, {
                title: "Lunch",
                start: moment("2017-09-18"),
                className: "m-fc-event--info m-fc-event--solid-accent",
                description: "Lorem ipsum dolor sit amet, ut labore"
              }, {
                title: "Meeting",
                start: moment("2017-09-24"),
                className: "m-fc-event--warning",
                description: "Lorem ipsum conse ctetur adipi scing"
              }, {
                title: "Happy Hour",
                start: moment("2017-09-24"),
                className: "m-fc-event--light m-fc-event--solid-focus",
                description: "Lorem ipsum dolor sit amet, conse ctetur"
              }, {
                title: "Dinner",
                start: moment("2017-09-24"),
                className: "m-fc-event--solid-focus m-fc-event--light",
                description: "Lorem ipsum dolor sit ctetur adipi scing"
              }, {
                title: "Birthday Party",
                start: moment("2017-09-24"),
                className: "m-fc-event--primary",
                description: "Lorem ipsum dolor sit amet, scing"
              }, {
                title: "Company Event",
                start: moment("2017-09-24"),
                className: "m-fc-event--danger",
                description: "Lorem ipsum dolor sit amet, scing"
              }, {
                title: "Click for Google",
                url: "http://google.com/",
                start: moment("2017-09-26"),
                className: "m-fc-event--solid-info m-fc-event--light",
                description: "Lorem ipsum dolor sit amet, labore"
              }],
              eventRender: function (e, t) {
                t.hasClass("fc-day-grid-event") ? (t.data("content", e.description), t.data("placement", "top"), mApp.initPopover(t)) : t.hasClass("fc-time-grid-event") ? t.find(".fc-title").append('<div class="fc-description">' + e.description + "</div>") : 0 !== t.find(".fc-list-item-title").lenght && t.find(".fc-list-item-title").append('<div class="fc-description">' + e.description + "</div>")
              }
            })
          }
        }(), a = $(".owl-carousel"), r = $("#m_widget_body_owlcarousel_items"), a.children().each(function (e) {
          $(this).attr("data-position", e)
        }), r.owlCarousel({
          rtl: mUtil.isRTL(),
          items: 1,
          animateIn: "fadeIn(100)",
          loop: !0
        }), a.owlCarousel({
          rtl: mUtil.isRTL(),
          center: !0,
          loop: !0,
          items: 2
        }), $(document).on("click", ".carousel", function () {
          a.trigger("to.owl.carousel", $(this).data("position"))
        })
    }
  }
}();
jQuery(document).ready(function () {
  Dashboard.init()
});