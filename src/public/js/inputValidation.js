/**
 * フォームのバリデーションを行い、
 * 値が有効であれば送信ボタンを活性化し、
 * 値が無効であればエラーメッセージを表示し送信ボタンを非活性化する
 */
function validateForm() {
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    const postalInput = document.getElementById("postal");
    const postalError = document.getElementById("postalError");
    const submitButton = document.getElementById("submitButton");

    // メールアドレスのバリデーション
    const isEmailValid = validateEmail(emailInput.value);
    displayValidationResult(isEmailValid, emailError);

    // 郵便番号のバリデーション
    const isPostalValid = validatePostal(postalInput.value);
    displayValidationResult(isPostalValid, postalError);

    // どちらの項目も有効であれば送信ボタンを活性化
    if (isEmailValid.isValid && isPostalValid.isValid) {
        submitButton.removeAttribute("disabled");
    } else {
        submitButton.setAttribute("disabled", "true");
    }
}

/**
 * バリデーション結果に基づいてエラーメッセージを表示または非表示にする
 * @param {object} validateInfo - バリデーション結果を含むオブジェクト
 * @param {boolean} validateInfo.isValid - バリデーション結果（true: 有効, false: 無効）
 * @param {string} validateInfo.message - エラーメッセージ
 * @param {HTMLElement} errorElement - エラーメッセージを表示する要素
 */
function displayValidationResult(validateInfo, errorElement) {
    if (validateInfo.isValid) {
        errorElement.textContent = "";
    } else {
        errorElement.textContent = validateInfo.message;
    }
}

/**
 * 入力されたメールアドレスのバリデーションをおこなう
 * @param {string} email - メールアドレスの入力値
 * @returns {object} バリデーション結果を含むオブジェクト
 * @property {boolean} isValid - メールアドレスが有効な場合はtrue、それ以外はfalse
 * @property {string} message - エラーメッセージ
 */
function validateEmail(email) {
    const emailValue = email.trim();
    const validateInfo = {
        isValid: true,
        message: "無効なメールアドレスです",
    };
    if (emailValue === "") {
        return validateInfo; // メールアドレスが空白の場合は有効
    }

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zAZ]{2,4}$/;
    validateInfo.isValid = emailPattern.test(emailValue);
    return validateInfo;
}

/**
 * 入力された郵便番号のバリデーションをおこなう
 * @param {string} postal - 郵便番号の入力値
 * @returns {object} バリデーション結果を含むオブジェクト
 * @property {boolean} isValid - 郵便番号が有効な場合はtrue、それ以外はfalse
 * @property {string} message - エラーメッセージ
 */
function validatePostal(postal) {
    const postalValue = postal.trim();
    const validateInfo = {
        isValid: true,
        message: "ハイフン付きで７桁の数字を入力してください",
    };
    if (postalValue === "") {
        return validateInfo; // 郵便番号が空白の場合は有効
    }

    const postalPattern = /^\d{3}-\d{4}$/;
    validateInfo.isValid = postalPattern.test(postalValue);
    return validateInfo;
}
