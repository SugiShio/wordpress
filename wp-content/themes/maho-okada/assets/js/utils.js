export const decNumRefToString = decNumRef => {
  return decNumRef.replace(/&#(\d+);/gi, (match, $1) => {
    return String.fromCharCode($1)
  })
}
