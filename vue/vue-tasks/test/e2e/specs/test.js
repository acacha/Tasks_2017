// For authoring Nightwatch tests, see
// http://nightwatchjs.org/guide#usage

module.exports = {

  'default e2e tests': function (browser) {
    // automatically uses dev Server port from /config.index.js
    // default: http://localhost:8080
    // see nightwatch.conf.js
    const devServer = browser.globals.devServerURL

    browser
      .url(devServer + '#/login')
      .windowMaximize()
      .waitForElementVisible('div.login-box', 5000)
      .setValue('input[name=email]', 'sergiturbadenas@gmail.com')
      .setValue('input[name=password]', '123456')
      .click('button[type=submit]')
      .pause(3000)
      .end()

    browser
      .url(devServer)
      .waitForElementVisible('#app', 5000)
      .assert.elementPresent('.hello')
      .assert.containsText('.hello h1', 'Welcome to Your Vue.js App')
      // .assert.elementCount('img', 1)
      .end()
  }
}
