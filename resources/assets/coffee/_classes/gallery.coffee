###
#    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
#
#    This file is part of osu!web. osu!web is distributed with the hope of
#    attracting more community contributions to the core ecosystem of osu!.
#
#    osu!web is free software: you can redistribute it and/or modify
#    it under the terms of the Affero GNU General Public License version 3
#    as published by the Free Software Foundation.
#
#    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
#    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
#    See the GNU Affero General Public License for more details.
#
#    You should have received a copy of the GNU Affero General Public License
#    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
###

class @Gallery
  constructor: ->
    @container = document.getElementsByClassName('pswp')

    $(document).on 'click', '.js-gallery', @initiateOpen
    $(document).on 'click', '.js-gallery-thumbnail', @switchPreview

    $(document).on 'turbolinks:before-cache', ->
      $('.js-gallery--container').remove()


  initiateOpen: (e) =>
    $target = $(e.currentTarget)
    return if $target.parents('a').length

    e.preventDefault()
    index = parseInt $target.attr('data-index'), 10
    galleryId = $target.attr('data-gallery-id')
    @open {galleryId, index}


  open: ({galleryId, index}) =>
    container = @container[0].cloneNode(true)
    container.classList.add 'js-gallery--container'
    document.body.appendChild container

    pswp = new PhotoSwipe container,
      PhotoSwipeUI_Default
      @data galleryId
      showHideOpacity: true
      getThumbBoundsFn: @thumbBoundsFn(galleryId)
      index: index
      history: false
      timeToIdle: null

    if _.startsWith(galleryId, 'contest-')
      new _exported.GalleryContest(container, pswp)

    pswp.init()

    $(document).one 'gallery:close', ->
      # ignore any failures (in case already destroyed)
      try pswp.close()


  data: (galleryId) ->
    for el in document.querySelectorAll(".js-gallery[data-gallery-id='#{galleryId}']")
      src = el.getAttribute('data-src') ? el.getAttribute('href')

      element: el
      msrc: src
      src: src
      w: parseInt el.getAttribute('data-width'), 10
      h: parseInt el.getAttribute('data-height'), 10


  thumbBoundsFn: (galleryId) =>
    (i) =>
      $thumb = $(".js-gallery[data-gallery-id='#{galleryId}'][data-index='#{i}']")
      thumbPos = $thumb.offset()

      thumbDim = [
        $thumb.width()
        $thumb.height()
      ]

      center = [
        thumbPos.left + thumbDim[0] / 2
        thumbPos.top + thumbDim[1] / 2
      ]

      imageDim = [
        parseInt $thumb.attr('data-width'), 10
        parseInt $thumb.attr('data-height'), 10
      ]

      scale = Math.max thumbDim[0] / imageDim[0], thumbDim[1] / imageDim[1]
      scaledImageDim = imageDim.map (s) -> s * scale

      x: center[0] - scaledImageDim[0] / 2
      y: center[1] - scaledImageDim[1] / 2
      w: scaledImageDim[0]


  switchPreview: (e) =>
    e.preventDefault()

    $link = $(e.currentTarget)
    {galleryId, index} = $link[0].dataset
    $previews = $(".js-gallery[data-gallery-id='#{galleryId}']")
    $links = $(".js-gallery-thumbnail[data-gallery-id='#{galleryId}']")

    for pair in _.zip($links, $previews)
      if index == pair[0].dataset.index
        pair[0].classList.add 'js-gallery-thumbnail--active'
        Fade.in pair[1]
      else
        pair[0].classList.remove 'js-gallery-thumbnail--active'
        Fade.out pair[1]
