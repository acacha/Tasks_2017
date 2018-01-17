module.exports = function (browser, url) {
  return browser
    .url(url)
    .waitForElementVisible('body', 1000)
    .setValue('input[name="email"]', 'myusername')
    .setValue('input[name="password"]', 'mypwd')
    .click('input[name="todo"]')
}
