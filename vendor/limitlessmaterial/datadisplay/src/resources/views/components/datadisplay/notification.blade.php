<a href="#" class="navbar-nav-link px-2" data-toggle="dropdown" data-target="#headerNotificationDropdown">
    <i class="fas fa-bell"></i>
    <span class="badge bg-orange-300 badge-pill" id="unread_message">0</span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350" id="headerNotificationDropdown">
    <div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                <li class="nav-item"><a href="#act_notification" class="nav-link active" data-toggle="tab">Action</a>
                </li>
                <li class="nav-item"><a href="#info_notification" class="nav-link " data-toggle="tab">Info</a>
                </li>
            </ul>
            <div class="tab-content" style="max-height: 400px;width: 500px;overflow:auto">
                <div class="tab-pane fade show active" id="act_notification">
                    <div class="act_notification_list"></div>
                    <div class="text-center">
                        <i class="icon-spinner6 spinner act_notification_spinner display_none p-2"
                            style="font-size:25px"></i>
                    </div>
                    <div class="load_more_button_act_notification text-center"></div>
                </div>
                <div class="tab-pane fade" id="info_notification">
                    <div class="info_notification_list"></div>
                    <div class="text-center">
                        <i class="icon-spinner6 spinner info_notification_spinner display_none p-2"
                            style="font-size:25px"></i>
                    </div>
                    <div class="load_more_button_info_notification text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>


         
        var startWithCountActNotification = 1;
        var startWithCountInfoNotification = 1;
        let act_notification_spinner = document.querySelector(".act_notification_spinner");
        let info_notification_spinner = document.querySelector(".info_notification_spinner");

        if (document.querySelector(".act_notification_spinner_dashboard") != undefined) {
            var startWithCountActNotificationDashboard = 1;
            var startWithCountInfoNotificationDashboard = 1;
            var act_notification_spinner_dashboard = document.querySelector(".act_notification_spinner_dashboard");
            var info_notification_dashboard_spinner = document.querySelector(".info_notification_dashboard_spinner");
        }

        function callingActNotification(input = null, whereClick = null) {
            let isPageLoad;
            let nextPageurl;
            let uri;
            if (whereClick == 'local') {
                act_notification_spinner_dashboard != undefined ? act_notification_spinner_dashboard.classList.remove(
                    "display_none") : '';
                isPageLoad = input && input.dataset.next_page_url ? false : true;
                nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                uri = nextPageurl ? nextPageurl : BASE_URL + `system/act/notification`
            } else {
                /* Default on page load */
                act_notification_spinner.classList.remove("display_none");
                isPageLoad = input && input.dataset.next_page_url ? false : true;
                nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                uri = nextPageurl ? nextPageurl : BASE_URL + `system/act/notification`;
                if (isPageLoad) {
                    act_notification_spinner_dashboard != undefined ? act_notification_spinner_dashboard.classList.remove(
                        "display_none") : '';
                }
            }
            fetch(
                    uri
                ).then((res)=>res.json())
                .then((responseData) => {
                    if (responseData.status) {
                        if (responseData.status == "access_denied") {
                            window.location.href = BASE_URL + 'unauthorized';
                            return true;
                        }
                    }
                    if (isPageLoad) {
                        /*Both*/
                        act_notification_spinner_dashboard != undefined ? act_notification_spinner_dashboard.classList
                            .add("display_none") : '';
                        act_notification_spinner.classList.add("display_none");
                    } else {
                        /*Conditional*/
                        if (whereClick == 'local') {
                            act_notification_spinner_dashboard != undefined ? act_notification_spinner_dashboard
                                .classList.add("display_none") : '';
                        } else {
                            act_notification_spinner.classList.add("display_none");
                        }
                    }
                    /* Pre process Done*/
                    let {
                        data: {
                            act: act_data
                        }
                    } = responseData;
                    let act_notification_list = act_data;
                    if (isPageLoad) {
                        if (document.querySelector(`.load_more_button_act_notification_dashboard`) != undefined) {
                            startWithCountActNotificationDashboard = parseInt(act_notification_list.current_page) *
                                DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateNotificationData(act_notification_list.data,
                                `.act_notification_list_dashboard`, startWithCountActNotificationDashboard);
                            if (act_data.next_page_url) {
                                let load_more = act_data.next_page_url ? act_data.next_page_url : '';
                                document.querySelector(`.load_more_button_act_notification_dashboard`).innerHTML =
                                    `<button class='badge btn bg-success' data-next_page_url="${load_more}" onclick="callingActNotification(this,'local')">Load More</button>`;
                            } else {
                                document.querySelector(`.load_more_button_act_notification_dashboard`).innerHTML = ""
                            }
                        }

                        startWithCountActNotification = parseInt(act_notification_list.current_page) *
                            DEFAULT_PAGINATE_ITEM -
                            DEFAULT_PAGINATE_ITEM_START_CAL;
                        populateNotificationData(act_notification_list.data, `.act_notification_list`,
                            startWithCountActNotification);
                        if (act_data.next_page_url) {
                            let load_more = act_data.next_page_url ? act_data.next_page_url : '';
                            document.querySelector(`.load_more_button_act_notification`).innerHTML =
                                `<button class='btn bg-success' data-next_page_url="${load_more}" onclick="callingActNotification(this)">Load More</button>`;
                        } else {
                            document.querySelector(`.load_more_button_act_notification`).innerHTML = ""
                        }

                    } else {
                        if (whereClick == 'local') {
                            startWithCountActNotificationDashboard = parseInt(act_notification_list.current_page) *
                                DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateNotificationData(act_notification_list.data,
                                `.act_notification_list_dashboard`, startWithCountActNotificationDashboard);
                            if (act_data.next_page_url) {
                                let load_more = act_data.next_page_url ? act_data.next_page_url : '';
                                document.querySelector(`.load_more_button_act_notification_dashboard`).innerHTML =
                                    `<button class='badge btn bg-success' data-next_page_url="${load_more}" onclick="callingActNotification(this,'local')">Load More</button>`;
                            } else {
                                document.querySelector(`.load_more_button_act_notification_dashboard`).innerHTML = ""
                            }
                        } else {
                            startWithCountActNotification = parseInt(act_notification_list.current_page) *
                                DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateNotificationData(act_notification_list.data, `.act_notification_list`,
                                startWithCountActNotification);
                            if (act_data.next_page_url) {
                                let load_more = act_data.next_page_url ? act_data.next_page_url : '';
                                document.querySelector(`.load_more_button_act_notification`).innerHTML =
                                    `<button class='btn bg-success' data-next_page_url="${load_more}" onclick="callingActNotification(this)">Load More</button>`;
                            } else {
                                document.querySelector(`.load_more_button_act_notification`).innerHTML = ""
                            }
                        }
                    }
                })
                .catch((err) => {
                    console.log(err, err.data);
                });
        }
        callingActNotification();

        function callingInfoNotification(input = null, whereClick = null) {

            let isPageLoad;
            let nextPageurl;
            let uri;
            if (whereClick == 'local') {
                info_notification_dashboard_spinner != undefined ? info_notification_dashboard_spinner.classList.remove(
                    "display_none") : '';
                isPageLoad = input && input.dataset.next_page_url ? false : true;
                nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                uri = nextPageurl ? nextPageurl : BASE_URL + `system/ack/notification`
            } else {
                /* Default on page load */
                info_notification_spinner.classList.remove("display_none");
                isPageLoad = input && input.dataset.next_page_url ? false : true;
                nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                uri = nextPageurl ? nextPageurl : BASE_URL + `system/ack/notification`;
                if (isPageLoad) {
                    info_notification_dashboard_spinner != undefined ? info_notification_dashboard_spinner.classList.remove(
                        "display_none") : '';
                }
            }
            fetch(
                    uri
                )
                .then((res)=>res.json())
                .then((responseData) => {
                    if (responseData.status) {
                        if (responseData.status == "access_denied") {
                            window.location.href = BASE_URL + 'unauthorized';
                            return true;
                        }
                    }
                    if (isPageLoad) {
                        /*Both*/
                        info_notification_dashboard_spinner != undefined ? info_notification_dashboard_spinner.classList
                            .add("display_none") : '';
                        info_notification_spinner.classList.add("display_none");
                    } else {
                        /*Conditional*/
                        if (whereClick == 'local') {
                            info_notification_dashboard_spinner != undefined ? info_notification_dashboard_spinner
                                .classList.add("display_none") : '';
                        } else {
                            info_notification_spinner.classList.add("display_none");
                        }
                    }

                    let {
                        data: {
                            info: info_data
                        }
                    } = responseData;
                    let info_notification_list = info_data;
                    //////////////////////////////
                    if (isPageLoad) {
                        if (document.querySelector(`.load_more_button_info_notification_dashboard`) != undefined) {
                            startWithCountInfoNotificationDashboard = parseInt(info_notification_list.current_page) *
                                DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateNotificationData(info_notification_list.data,
                                '.info_notification_list_dashboard', startWithCountInfoNotificationDashboard);
                            if (info_data.next_page_url) {
                                let load_more = info_data.next_page_url ? info_data.next_page_url : '';
                                document.querySelector(`.load_more_button_info_notification_dashboard`).innerHTML =
                                    `<button class='badge btn bg-success' data-next_page_url="${load_more}" onclick="callingInfoNotification(this,'local')">Load More</button>`;
                            } else {
                                document.querySelector(`.load_more_button_info_notification_dashboard`).innerHTML = ""
                            }
                        }

                        startWithCountInfoNotification = parseInt(info_notification_list.current_page) *
                            DEFAULT_PAGINATE_ITEM -
                            DEFAULT_PAGINATE_ITEM_START_CAL;
                        populateNotificationData(info_notification_list.data, '.info_notification_list',
                            startWithCountInfoNotification);
                        if (info_data.next_page_url) {
                            let load_more = info_data.next_page_url ? info_data.next_page_url : '';
                            document.querySelector(`.load_more_button_info_notification`).innerHTML =
                                `<button class='btn bg-success' data-next_page_url="${load_more}" onclick="callingInfoNotification(this)">Load More</button>`;
                        } else {
                            document.querySelector(`.load_more_button_info_notification`).innerHTML = ""
                        }

                    } else {
                        if (whereClick == 'local') {
                            startWithCountInfoNotificationDashboard = parseInt(info_notification_list.current_page) *
                                DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateNotificationData(info_notification_list.data,
                                '.info_notification_list_dashboard', startWithCountInfoNotificationDashboard);
                            if (info_data.next_page_url) {
                                let load_more = info_data.next_page_url ? info_data.next_page_url : '';
                                document.querySelector(`.load_more_button_info_notification_dashboard`).innerHTML =
                                    `<button class='badge btn bg-success' data-next_page_url="${load_more}" onclick="callingInfoNotification(this,'local')">Load More</button>`;
                            } else {
                                document.querySelector(`.load_more_button_info_notification_dashboard`).innerHTML = ""
                            }
                        } else {
                            startWithCountInfoNotification = parseInt(info_notification_list.current_page) *
                                DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateNotificationData(info_notification_list.data, '.info_notification_list',
                                startWithCountInfoNotification);
                            if (info_data.next_page_url) {
                                let load_more = info_data.next_page_url ? info_data.next_page_url : '';
                                document.querySelector(`.load_more_button_info_notification`).innerHTML =
                                    `<button class='btn bg-success' data-next_page_url="${load_more}" onclick="callingInfoNotification(this)">Load More</button>`;
                            } else {
                                document.querySelector(`.load_more_button_info_notification`).innerHTML = ""
                            }
                        }
                    }
                    //////////////////////////////

                })
                .catch((err) => {
                    console.log(err, err.data);
                });
        }
        callingInfoNotification();

        function populateNotificationData(data, identifier, startWithCount) {
            let heading_property = [
                "document_id",
                "document_url",
                "message",
                "notification_id",
                "read_at",
                "read_url",
                "updated_at"
            ];
            let htmlOutput = MAKE_TABLE_NOTIFICATION(heading_property, data, startWithCount)
            document.querySelector(`${identifier}`).innerHTML += htmlOutput;
        }

        function MAKE_TABLE_NOTIFICATION(
            heading_property,
            data
        ) {
            let htmlOutput = "";
            //body
            let count = 1;
            // console.log(data);
            for (let datadisplay in data) {
                htmlOutput += `<div>`;
                heading_property.forEach(key => {
                    if (key == "message") {
                                        htmlOutput += `<div class="p-2 notification-details mb-1">
                                            <a class="${!data[datadisplay]['read_at']? 'cursor-pointer description-link':'cursor-pointer description-link text-default'}"
                            onclick="readNotification('${data[datadisplay]['method']}','${data[datadisplay]['read_url']}','${data[datadisplay]['document_url']}','${data[datadisplay]['is_v1']}')">
                            <span><i class="fas fa-file fa-1x text-success"></i></span>
                            ${
                                data[datadisplay][key] && data[datadisplay][key].length > 50
                                    ? data[datadisplay][key].substring(0, 50) + `...`
                                    : data[datadisplay][key]
                            }
                            <div>
                                <span><i class="fas fa-file fa-1x text-success" style="visibility:hidden"></i></span>
                                ${
                                data[datadisplay]['diffforhuman']
                                    ? data[datadisplay]['diffforhuman']
                                    : ""
                            }
                                ${
                                data[datadisplay]['read_at']
                                    ?'<span> ReadAt: </span>'
                                    : ""
                            }
                            ${
                                data[datadisplay]['read_at']
                                    ?  data[datadisplay]['read_at']
                                    : ""
                            }
                            </div>
                        </a>
                        </div>`;
                    }
                });
                htmlOutput += `</div>`;
            }
            //If no data is there;
            if (Object.keys(data).length == 0) {
                let colspan = Object.keys(heading_property).length;
                htmlOutput += `<div>`;
                htmlOutput += `<div class='text-center no-record-found' colspan='${colspan}'>No Record Found</div>`;
                htmlOutput += `</div>`;
            }
            return htmlOutput;
        }

        /*Read Notification*/
        function readNotification(method, read_notification_url, base_document_url, is_v1) {
            fetch(read_notification_url)
                .then((res)=>res.json())
                .then((responseData) => {
                    if (responseData.status) {
                        if (responseData.status == "access_denied") {
                            window.location.href = BASE_URL + 'unauthorized';
                            return false;
                        }
                    }
                    window.location.href = base_document_url;
                    return true;
                })
                .catch((err) => {
                    console.log(err, err.data);
                });
        }
        /*End*/

        /*Notification Count Api Calling*/
        fetch(
                BASE_URL + `system/count/notification`,
            )
            .then((res)=>res.json())
            .then((responseData) => {
                console.log(responseData);
                if (responseData.status) {
                    if (responseData.status == "access_denied") {
                        window.location.href = BASE_URL + 'unauthorized';
                        return true;
                    }
                }
                document.getDataDisplayById('unread_message').innerHTML = responseData.data.total_count
            })
            .catch((err) => {
                console.log(err, err.data);
            });
        /*End*/
    </script>
@endpush

<style>
    .display_none {
        display: none
    }

    .notification-details {
        background-color: rgb(242, 241, 241);
        border-radius: 10px;
    }

    .text-default {
        color: black
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .head-tab-content-line-one-notification {
        max-height: 130px;
        overflow: auto
    }
</style>

@push('js')
    <script>
        if (!('Notification' in window)) {
            alert('Web Notification is not supported');
        }
    </script>
    <script src="{{ asset('js/laravel-echo-hola.js') }}"></script>
    <script>
        let auth_user = JSON.parse(localStorage.getItem('auth_user'))
        if(typeof Echo != 'undefined'){
        Echo.channel(
                `notification-from-movement-channel-{{ auth()->user()->office_id }}-{{ auth()->user()->active_role_id }}`)
            .listen('.Movement\\Events\\DocumentMovementEvent', (e) => {
                let {
                    notification,
                    misc
                } = e;
                if (!window.Notification) {
                    console.log('Browser does not support notifications.');
                } else {
                    if (Notification.permission === 'granted') {
                        trigger_desktop_notification(notification)
                    } else {
                        Notification.requestPermission().then(function(p) {
                            if (p === 'granted') {
                                trigger_desktop_notification(notification)
                            } else {
                                console.log('User blocked notifications.');
                            }
                        }).catch(function(err) {
                            console.error(err);
                        });
                    }
                }
                let notification_data = `<div><div class="p-2 notification-details mb-1">
                            <a class="cursor-pointer description-link" onclick="readNotification('${misc.method}','${misc.read_notification_url}','${misc.base_document_url}','${misc.is_v1}')">
            <span><i class="fas fa-file fa-1x text-success"></i></span>
            ${
                notification['data']['message'] && notification['data']['message'].length > 50
                    ? notification['data']['message'].substring(0, 50) + `...`
                    : notification['data']['message']
            }
            <div>
                <span><i class="fas fa-file fa-1x text-success" style="visibility:hidden"></i></span>
                ${notification.notified_before??''}
            </div>
        </a>
        </div></div>`
                let act_notification_list = document.querySelector(`.act_notification_list`)
                document.querySelector(`.act_notification_list`).insertAdjacentHTML('afterbegin',
                    notification_data);
                if (act_notification_list.querySelector(`.no-record-found`) != undefined) {
                    act_notification_list.querySelector(`.no-record-found`).innerHTML = '';
                }
            });
        }

        function trigger_desktop_notification(notification) {
            Notification.requestPermission(permission => {
                let notification_desktop = new Notification('AIMS', {
                    body: notification['data']['message'] && notification['data']['message'].length > 40 ?
                        notification['data']['message'].substring(0, 40) + `...` :
                        notification['data']['message'],
                    icon: `${BASE_URL}baf_logo.png`
                });
                // link to page on clicking the notification
                notification_desktop.onclick = () => {
                    window.open(misc.base_document_url);
                };
            })
        }
    </script>
@endpush
