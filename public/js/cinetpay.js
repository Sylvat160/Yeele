CinetPay = new (class {
    cdnjs =
        "https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.min.js";
    cinetpay_url = "https://api-checkout.cinetpay.com/v2";
    socket_server = "https://robot-checkout.cinetpay.com";
    checkout = null;
    payment_data = null;
    response = null;
    error = { message: null, description: null };
    config = {
        apikey: null,
        site_id: null,
        mode: null,
        type: null,
        notify_url: null,
        device_id: null,
    };
    type = "WEB";
    old_socket_id = null;
    new_socket_id = null;
    socket_disconnect = !1;
    checkout_close = !1;
    loaded = !1;
    async setConfig(e = this.config) {
        if ("object" != typeof e || void 0 === e)
            return (
                (this.error.message = "OBJECT_REQUIRED"),
                void (this.error.description =
                    "Set an object in your setConfig method")
            );
        (this.config = e),
            (this.config.mode = e.mode ? e.mode : this.config.mode),
            (this.type =
                this.config.type && "MOBILE" === this.config.type.toUpperCase()
                    ? "MOBILE"
                    : this.type),
            delete this.config.mode,
            delete this.config.type;
    }
    createHtmlModalElement() {
        let e = document.getElementById("cp_modal_first_parent"),
            t = document.createElement("div");
        (t.className = "cp-content-wrapper"),
            (t.id = "modal_first_parent_content_wrapper");
        let p = document.createElement("div");
        (p.className = "cp-content"),
            (p.id = "cp-content"),
            e.appendChild(t),
            t.appendChild(p);
    }
    closeCheckout() {
        document.getElementById("cp-close").addEventListener("click", () => {
            document.getElementById("cp_modal_first_parent").remove(),
                (this.checkout_close = !0);
        });
    }
    insertSvgCloseBtn(e) {
        navigator.userAgent.match(/iPhone/i) && "WEB" === this.type
            ? ((e.innerHTML = "x"),
              (e.style.color = "red"),
              (e.style.fontSize = "inherit"),
              (e.style.fontWeight = "500"))
            : (e.innerHTML =
                  '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"\n\t viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">\n<g>\n\t<g>\n\t\t<polygon points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512\n\t\t\t512,452.922 315.076,256 \t\t"/>\n\t</g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n<g>\n</g>\n</svg>');
    }
    displayButton() {
        if (
            "WEB" === this.type &&
            null == document.getElementById("cp-close")
        ) {
            let e = document.getElementById(
                    "modal_first_parent_content_wrapper"
                ),
                t = document.createElement("button");
            (t.className = "cp-close"),
                (t.id = "cp-close"),
                e.appendChild(t),
                this.insertSvgCloseBtn(t),
                this.closeCheckout();

                document.getElementById('cp-close').addEventListener('click', function() {
                    document.head.querySelector('style:last-of-type').innerHTML = ""
                })
        }
    }
    async getCheckout(e) {
        if ("object" != typeof e || void 0 === e)
            return (
                (this.error.message = "OBJECT_REQUIRED"),
                void (this.error.description =
                    "Set an object in your getCheckout method")
            );
        {
            this.payment_data = e;
            let t = document.getElementsByTagName("head")[0],
                p = document.getElementsByTagName("body")[0],
                i = document.createElement("div");
            (i.className = "cp-modal"),
                (i.id = "cp_modal_first_parent"),
                i.setAttribute("data-tiorna", "trigger-modal");
            let c = document.createElement("div");
            (c.id = "cp-loader"), (c.className = "text-center cp-loader");
            let n = document.createElement("div");
            (n.id = "germinator"), (n.className = "germinator");
            let r = document.createElement("span"),
                a = document.createElement("span"),
                d = document.createElement("span"),
                o = document.createElement("style"),
                l =
                    "input[type='text'], input[type='number'], input[type='email'], input[type='tel'], input[type='password'] {font-size: 16px;}#cp-close svg {fill: #fff;stroke: #fff;width: 10px;height: 10px;}button {cursor: pointer;}#cp-close:hover svg {fill: red;}body {overflow: hidden;position: relative;display: flex;align-items: center;justify-content: center;width: 100%;height: 100vh;}.cp-modal {position: fixed;top: 0;left: 0;display: flex;align-items: center;justify-content: center;height: 0vh;background-color: transparent;overflow: hidden;transition: background-color 0.25s ease;z-index: 9999;}.cp-modal.open {position: fixed;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.75);transition: background-color 0.25s;}.cp-modal.open > .cp-content-wrapper {transform: scale(1);}.cp-modal .cp-content-wrapper {position: relative;display: flex;flex-direction: column;align-items: center;justify-content: flex-start;width: 540px;height: 710px;margin: 0;padding: 2.5rem;background-color: transparent;border-radius: 0.3125rem;transform: scale(0);transition: transform 0.25s;transition-delay: 0.15s;}.cp-modal .cp-content-wrapper .cp-close {position: absolute;top: 0.5rem;right: 0.5rem;display: flex;align-items: center;justify-content: center;width: 1.5rem;height: 1.5rem;border: none;background-color: transparent;font-size: 1.5rem;transition: 0.25s linear;}.cp-modal .cp-content-wrapper .cp-modal-header {position: relative;display: flex;flex-direction: row;align-items: center;justify-content: space-between;width: 100%;margin: 0;padding: 0 0 1.25rem;}.cp-modal .cp-content-wrapper .cp-modal-header h2 {font-size: 1.5rem;font-weight: bold;}.cp-modal .cp-content-wrapper .cp-content {position: relative;display: flex;width: 100%;height: 100%;}.cp-modal .cp-content-wrapper .cp-content p {font-size: 0.875rem;line-height: 1.75;}.cp-modal .cp-content-wrapper .cp-modal-footer {position: relative;display: flex;align-items: center;justify-content: flex-end;width: 100%;margin: 0;padding: 1.875rem 0 0;}.cp-modal .cp-content-wrapper .cp-modal-footer .action {position: relative;margin-left: 0.625rem;padding: 0.625rem 1.25rem;border: none;background-color: slategray;border-radius: 0.25rem;color: white;font-size: 0.87rem;font-weight: 300;overflow: hidden;z-index: 1;}.cp-modal .cp-content-wrapper .cp-modal-footer .action:before {position: absolute;cp-content: \"\";top: .6rem;left: 0;width: 0%;height: 100%;background-color: rgba(255, 255, 255, 0.2);transition: width 0.25s;z-index: 0;}.cp-modal .cp-content-wrapper .cp-modal-footer .action:first-child {background-color: #2ecc71;}.cp-modal .cp-content-wrapper .cp-modal-footer .action:last-child {background-color: #e74c3c;}.cp-modal .cp-content-wrapper .cp-modal-footer .action:hover:before {width: 100%;}.germinator {display: block;position: absolute;z-index: 100;background-position: center;left: 50%;top: 50%;transform: translate(-50%, -50%);}.germinator span {vertical-align: middle;border-radius: 100%;display: inline-block;width: 3rem;height: 3rem;margin: 3px 2px;-webkit-animation: germinator 0.8s linear infinite alternate;animation: germinator 0.8s linear infinite alternate;}.germinator span:nth-child(1) {-webkit-animation-delay: -0.8s;animation-delay: -0.8s;background: #41ac4c;}.germinator span:nth-child(2) {-webkit-animation-delay: -0.26666s;animation-delay: -0.26666s;background: #357a4f;}.germinator span:nth-child(3) {-webkit-animation-delay: -0.8s;animation-delay: -0.8s;background: #41ac4c;}@keyframes germinator {from {transform: scale(0, 0);}to {transform: scale(1, 1);}}@-webkit-keyframes germinator {from {-webkit-transform: scale(0, 0);}to {-webkit-transform: scale(1, 1);}}@media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 320px) and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 375px) and (max-device-width: 812px) and (-webkit-min-device-pixel-ratio: 3) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 375px) and (max-device-width: 812px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media only screen and (min-device-width: 375px) and (max-device-width: 812px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 2) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 320px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}}@media screen and (device-width: 360px) and (device-height: 640px) and (-webkit-device-pixel-ratio: 4) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 384px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 2) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 384px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 384px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 3) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 4) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 360px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 4) and (orientation: portrait) {}@media screen and (device-width: 360px) and (device-height: 592px) and (-webkit-device-pixel-ratio: 4) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 480px) and (device-height: 800px) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 480px) and (device-height: 800px) and (orientation: portrait) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}}@media screen and (device-width: 480px) and (device-height: 800px) and (orientation: landscape) {.cp-modal .cp-content-wrapper {width: 100%;padding: .0rem;}#cp-close svg {fill: red;stroke: red;width: 15px;height: 15px;}.cp-modal .cp-content-wrapper .cp-close {top: .6rem;right: .6rem;}.cp-modal .cp-content-wrapper {height: clamp(600px, calc(100vh - 2rem), 741px);}} @media only screen and (max-device-width: 667px) {.cp-modal .cp-content-wrapper .cp-close {z-index: 100 !important;right: 0 !important;top: 9% !important;transform: translate(-50%, -50%) !important; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;border-radius: 5px !important;position: absolute !important;display: flex !important;align-items: center !important;justify-content: center !important;width: 1.5rem !important;height: 1.5rem !important;border: none !important;background-color: white !important;transition: 0.25s linear !important;}#cp-close svg{fill: red !important; stroke: red !important;}}";
            "MOBILE" === this.type &&
                (l +=
                    `
                    .cp-modal .cp-content-wrapper {
                        width: 100% !important;
                        height: 100% !important;
                        position: absolute !important;
                    }
                    `),
                (o.innerHTML = l),
                p.appendChild(i),
                i.appendChild(c),
                c.appendChild(n),
                n.appendChild(r),
                n.appendChild(a),
                n.appendChild(d),
                this.loaded || t.appendChild(o),
                document
                    .getElementById("cp_modal_first_parent")
                    .classList.toggle("open"),
                await this.initCheckout();
        }
    }
    async initSocket() {
        const e = io(this.socket_server);
        e.on("connect", () => {
            if (((this.config.device_id = e.id), this.socket_disconnect)) {
                if (
                    (console.log("Reconnected"),
                    (this.old_socket_id = this.new_socket_id),
                    null == this.response)
                ) {
                    let t = this.http();
                    (t.onprogress = function (e) {}),
                        (t.onreadystatechange = function (e) {
                            let p =
                                void 0 !== XMLHttpRequest.DONE
                                    ? XMLHttpRequest.DONE
                                    : 4;
                            if (t.readyState === p && 200 === t.status) {
                                let e = t.response;
                                if (202 !== e.code)
                                    return (
                                        (this.error.message = e.message),
                                        void (this.error.description =
                                            "An error occurred")
                                    );
                            } else if (t.readyState === p && 200 !== t.status)
                                return (
                                    (this.error.message = t.response.message),
                                    void (this.error.description =
                                        "An error occurred")
                                );
                        }.bind(this)),
                        (t.onload = function (e) {}),
                        (t.onerror = function (e) {}),
                        t.open("POST", this.cinetpay_url + "/seamless/device"),
                        t.setRequestHeader(
                            "Content-Type",
                            "application/json;charset=UTF-8"
                        ),
                        (t.responseType = "json");
                    let p = {
                        old_device_id: this.old_socket_id,
                        new_device_id: e.id,
                    };
                    t.send(JSON.stringify(p));
                }
            } else {
                console.log("Connected"), (this.new_socket_id = e.id);
                let t = this.http();
                (t.onprogress = function (e) {}),
                    (t.onreadystatechange = function (e) {
                        let p =
                            void 0 !== XMLHttpRequest.DONE
                                ? XMLHttpRequest.DONE
                                : 4;
                        if (t.readyState === p && 200 === t.status) {
                            let e = t.response;
                            if ("201" !== e.code)
                                return (
                                    (this.error.message = e.message),
                                    void (this.error.description =
                                        e.description)
                                );
                            {
                                let t = e.data;
                                (this.checkout = t.payment_url),
                                    this.openCheckout();
                            }
                        } else if (t.readyState === p && 200 !== t.status)
                            return (
                                (this.error.message = t.response.message),
                                void (this.error.description =
                                    t.response.description)
                            );
                    }.bind(this)),
                    (t.onload = function (e) {}),
                    (t.onerror = function (e) {}),
                    t.open("POST", this.cinetpay_url + "/payment"),
                    t.setRequestHeader(
                        "Content-Type",
                        "application/json;charset=UTF-8"
                    ),
                    (t.responseType = "json");
                let p = { ...this.config, ...this.payment_data };
                t.send(JSON.stringify(p));
            }
        }),
            e.on("disconnect", () => {
                console.log("Disconnected"), (this.socket_disconnect = !0);
            }),
            e.on("channel", (e) => {
                console.log("CinetPay Response sent"), (this.response = e);
            });
    }
    async initCheckout() {
        if (window.navigator.onLine) {
            let e = !1;
            if (this.loaded) (e = !0), await this.initSocket();
            else {
                let t = document.createElement("script");
                function p() {
                    let p;
                    e || ((p = t.readyState), "complete" === p && handleLoad());
                }
                function i() {
                    e || (e = !0);
                }
                (this.loaded = !0),
                    (t.onload = function () {
                        e || ((e = !0), this.initSocket());
                    }.bind(this)),
                    (t.onreadystatechange = p),
                    (t.onerror = i),
                    (t.src = this.cdnjs),
                    document.body.appendChild(t);
            }
        } else
            (document.getElementById(
                "cp_modal_first_parent"
            ).style.pointerEvents = "none"),
                "WEB" === this.type &&
                    setTimeout(() => {
                        (document.getElementById(
                            "cp_modal_first_parent"
                        ).style.display = "none"),
                            (this.error.message = "ERROR_CONNECTION"),
                            (this.error.description =
                                "Please enable your internet connection and retry");
                    }, 1e3);
    }
    openCheckout() {
        let e = document.createElement("iframe");
        (e.id = "checkout"),
            (e.src = this.checkout),
            (e.style.borderWidth = "0"),
            (e.style.width = "100%"),
            (e.style.height = "100%"),
            this.createHtmlModalElement(),
            document.getElementById("cp-content").appendChild(e);
        let t = setInterval(
            function () {
                let e = this;
                document.getElementById("checkout").onload = function () {
                    (document.getElementById("cp-loader").style.display =
                        "none"),
                        e.displayButton(),
                        clearInterval(t);
                }.bind(e);
            }.bind(this),
            10
        );
    }
    waitResponse(e) {
        let t = setInterval(
            function () {
                null != this.response && (e(this.response), clearInterval(t));
            }.bind(this),
            300
        );
    }
    onError(e) {
        let t = setInterval(
            function () {
                null != this.error.message &&
                    null != this.error.description &&
                    (e(this.error), clearInterval(t));
            }.bind(this),
            300
        );
    }
    onClose(e) {
        let t = setInterval(
            function () {
                this.checkout_close &&
                    (e(), (this.checkout_close = !1), clearInterval(t));
            }.bind(this),
            300
        );
    }
    http() {
        let e = null;
        if (window.XMLHttpRequest) e = new XMLHttpRequest();
        else {
            for (
                let t = [
                        "MSXML2.XmlHttp.6.0",
                        "MSXML2.XmlHttp.5.0",
                        "MSXML2.XmlHttp.4.0",
                        "MSXML2.XmlHttp.3.0",
                        "MSXML2.XmlHttp.2.0",
                        "Microsoft.XmlHttp",
                    ],
                    p = 0;
                p < t.length;
                p++
            )
                try {
                    e = new ActiveXObject(t[p]);
                    break;
                } catch (e) {
                    return (
                        (this.error.message = e.name),
                        void (this.error.description = e.message)
                    );
                }
            e.setRequestHeader("Accept", "*/*");
        }
        return e;
    }
})();
