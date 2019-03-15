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

import { Modal } from 'modal'
import { createElement as el, createRef, PureComponent } from 'react'
import { button, div, i, span, textarea } from 'react-dom-factories'
import { SelectOptions } from 'select-options'

bn = 'report-form'

export class ReportForm extends PureComponent
  @defaultProps =
    allowOptions: true


  constructor: (props) ->
    super props

    @options = [
      { id: 'Cheating', text: osu.trans 'users.report.options.cheating' },
      { id: 'Insults', text: osu.trans 'users.report.options.insults' },
      { id: 'Spam', text: osu.trans 'users.report.options.spam' },
      { id: 'UnwantedContent', text: osu.trans 'users.report.options.unwanted_content' },
      { id: 'Nonsense', text: osu.trans 'users.report.options.nonsense' },
      { id: 'Other', text: osu.trans 'users.report.options.other' },
    ]

    @textarea = createRef()

    @state =
      selectedReason: @options[0]


  onItemSelected: (item) =>
    @setState selectedReason: item


  render: =>
    return null if !@props.visible
    @renderForm()


  renderForm: =>
    title = if @props.completed
              osu.trans 'users.report.thanks'
            else
              @props.title

    el Modal,
      onClose: @props.onClose
      visible: @props.visible
      div
        className: bn
        div
          className: "#{bn}__header"
          div
            className: "#{bn}__row #{bn}__row--exclamation"
            i className: 'fas fa-exclamation-triangle'

          div
            className: "#{bn}__row"
            dangerouslySetInnerHTML:
              __html: "<span>#{title}</span>" # wrap in span to preserve the whitespace in text.

        @renderFormContent() if !@props.completed


  renderFormContent: =>
    div null,
      if @props.allowOptions
        [
          div
            key: 'label'
            className: "#{bn}__row"
            osu.trans 'users.report.reason'

          div
            key: 'options'
            className: "#{bn}__row"
            el SelectOptions,
              blackout: false
              bn: "#{bn}-select-options"
              onItemSelected: @onItemSelected
              options: @options
              selected: @state.selectedReason
        ]

      div
        className: "#{bn}__row"
        osu.trans 'users.report.comments'

      div
        className: "#{bn}__row"
        textarea
          className: "#{bn}__textarea"
          placeholder: osu.trans 'users.report.placeholder'
          ref: @textarea

      div
        className: "#{bn}__row #{bn}__row--buttons"
        [
          button
            className: "#{bn}__button #{bn}__button--report"
            disabled: @props.disabled
            key: 'report'
            type: 'button'
            onClick: @sendReport
            osu.trans 'users.report.actions.send'

          button
            className: "#{bn}__button"
            disabled: @props.disabled
            key: 'cancel'
            type: 'button'
            onClick: @props.onClose
            osu.trans 'users.report.actions.cancel'
        ]


  sendReport: (e) =>
    data =
      reason: @state.selectedReason.id
      comments: @textarea.current.value

    @props.onSubmit? data

