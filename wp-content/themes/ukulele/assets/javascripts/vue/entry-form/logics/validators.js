export const VALIDATORS = {
  require({ value, config, n }) {
    if (config.value < n || !!value) return false
    return config.message
  },
  regex({ value, config }) {
    const regex = new RegExp(config.value)
    if (!value || regex.test(value)) return false
    return config.message
  },
  twice({ value, config, confirmValue }) {
    if (value === confirmValue) return false
    return config.message
  }
}
