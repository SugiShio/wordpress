import './gallery'
import { setNavigation } from './navigation'
import { setMoviePlayer } from './movie-player'
import { setEntryForm } from './entry-form'

$(function() {
  if ($('#navigation')[0]) {
    setNavigation()
  }

  if ($('#movie-player')[0]) {
    setMoviePlayer()
  }

  if ($('.mw_wp_form')[0]) {
    setEntryForm('.mw_wp_form')
  }
})
