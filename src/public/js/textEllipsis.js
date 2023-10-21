/**
 * テキスト要素に文字数制限を適用し、マウスホバー時に完全なテキストを表示する
 */
const applyTextLimit = () => {
    /**
     * テキストの最大文字数
     * @type {number}
     */
    let maxLength = 25;

    /**
     * `.contact__table-opinion` クラスを持つテキスト要素のリスト
     * @type {NodeList}
     */
    let limitedTextElements = document.querySelectorAll(
        ".contact__table-opinion"
    );

    limitedTextElements.forEach((element) => {
        /**
         * オリジナルのテキスト内容
         * @type {string}
         */
        let originalText = element.innerText;

        if (originalText.length > maxLength) {
            /**
             * 切り詰められたテキスト
             * @type {string}
             */
            let truncatedText = originalText.substr(0, maxLength) + "...";

            element.addEventListener("mouseover", function () {
                // マウスホバー時に完全なテキストを表示
                element.innerText = originalText;
            });

            element.addEventListener("mouseout", function () {
                // マウスホバーから外れた際に切り詰められたテキストを再表示
                element.innerText = truncatedText;
            });

            // ページ読み込み時にテキストを切り詰めて表示
            element.innerText = truncatedText;
        }
    });
};

// 関数を呼び出して実行
applyTextLimit();
