export default {
  debug: true,
  state: {
    token: null,
    foo: 'bar',
    patata: 'caliente'
  },
  setTokenAction (newValue) {
    if (this.debug) console.log('setTokenAction triggered with', newValue)
    this.state.token = newValue
  },
  clearTokenAction () {
    if (this.debug) console.log('clearTokenAction triggered')
    this.state.token = null
  }
}
