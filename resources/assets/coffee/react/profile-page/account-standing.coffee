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
{div, span, h3, table, thead, tbody, tr, th, td, time} = ReactDOMFactories
el = React.createElement

bn = 'profile-extra-recent-infringements'

class ProfilePage.AccountStanding extends React.PureComponent
  columns = ['date', 'action', 'length', 'description']

  render: ->
    latest = _.find @props.user.account_history, (d) -> d.type == 'silence'
    endTime = moment(latest.timestamp).add(latest.length, 'seconds') if latest?

    div
      className: 'page-extra'
      el ProfilePage.ExtraHeader, name: @props.name, withEdit: false

      if latest?
        div
          className: "page-extra__alert page-extra__alert--warning"
          span
            dangerouslySetInnerHTML:
              __html: osu.trans 'users.show.extra.account_standing.bad_standing',
                username: @props.user.username

      if latest? && endTime.isAfter()
        div
          className: "page-extra__alert page-extra__alert--info"
          span
            dangerouslySetInnerHTML:
              __html: osu.trans 'users.show.extra.account_standing.remaining_silence',
                username: @props.user.username
                duration: osu.timeago endTime.format()

      h3
        className: 'page-extra__title page-extra__title--small'
        osu.trans 'users.show.extra.account_standing.recent_infringements.title'

      div
        className: "#{bn}"
        table
          className: "#{bn}__table"
          thead {},
            tr {},
              for column in columns
                th
                  key: column
                  className: "#{bn}__table-cell #{bn}__table-cell--header #{bn}__table-cell--#{column}"
                  osu.trans "users.show.extra.account_standing.recent_infringements.#{column}"

          tbody {},
            @table @props.user.account_history

  table: (events) ->
    for event, i in events
      tr
        key: i

        td
          className: "#{bn}__table-cell #{bn}__table-cell--date"
          time
            className: "timeago"
            dateTime: event.timestamp
            moment(event.timestamp).fromNow()

        td
          className: "#{bn}__table-cell #{bn}__table-cell--action"
          div
            className: "#{bn}__action #{bn}__action--#{event.type}"
            osu.trans "users.show.extra.account_standing.recent_infringements.actions.#{event.type}"

        td
          className: "#{bn}__table-cell #{bn}__table-cell--length"
          if event.type == 'restriction'
            div
              className: "#{bn}__action #{bn}__action--restriction"
              osu.trans 'users.show.extra.account_standing.recent_infringements.length_permanent'
          else if event.type == 'note'
            ''
          else
            moment.duration(event.length, 'seconds').humanize()

        td
          className: "#{bn}__table-cell #{bn}__table-cell--description"
          span
            className: "#{bn}__description"
            event.description
            if currentUser.is_admin && event.actor?
              span
                className: "#{bn}__actor"
                dangerouslySetInnerHTML:
                  __html: osu.trans 'users.show.extra.account_standing.recent_infringements.actor',
                    username: osu.link laroute.route('users.show', user: event.actor.id), event.actor.username
