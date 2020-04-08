// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { BeatmapsetJSON } from 'beatmapsets/beatmapset-json';
import GenreJson from 'interfaces/genre-json';
import LanguageJson from 'interfaces/language-json';
import { route } from 'laroute';
import * as React from 'react';

interface Props {
  beatmapset: BeatmapsetJSON;
  onClose: () => void;
}

interface State {
  genreId: number;
  isBusy: boolean;
  languageId: number;
}

export default class MetadataEditor extends React.PureComponent<Props, State> {
  private genres = osu.parseJson('json-genres') as GenreJson[];
  private languages = osu.parseJson('json-languages') as LanguageJson[];

  constructor(props: Props) {
    super(props);

    this.state = {
      genreId: props.beatmapset.genre.id ?? 0,
      isBusy: false,
      languageId: props.beatmapset.language.id ?? 0,
    };
  }

  render() {
    return (
      <form className='simple-form simple-form--modal'>
        <label className='simple-form__row'>
          <div className='simple-form__label'>
            {osu.trans('beatmapsets.show.info.language')}
          </div>

          <div className='form-select form-select--full'>
            <select
              name='beatmapset[language_id]'
              className='form-select__input'
              value={this.state.languageId}
              onChange={this.setLanguageId}
            >
              {this.languages.map((language) => (
                language.id === null ? null :
                  <option key={language.id} value={language.id}>
                    {language.name}
                  </option>
              ))}
            </select>
          </div>
        </label>

        <label className='simple-form__row'>
          <div className='simple-form__label'>
            {osu.trans('beatmapsets.show.info.genre')}
          </div>

          <div className='form-select form-select--full'>
            <select
              name='beatmapset[genre_id]'
              className='form-select__input'
              value={this.state.genreId}
              onChange={this.setGenreId}
            >
              {this.genres.map((genre) => (
                genre.id === null ? null :
                  <option key={genre.id} value={genre.id}>
                    {genre.name}
                  </option>
              ))}
            </select>
          </div>
        </label>

        <div className='simple-form__row simple-form__row--no-label'>
          <div className='simple-form__buttons'>
            <div className='simple-form__button'>
              <button
                type='button'
                className='btn-osu-big btn-osu-big--rounded-thin'
                disabled={this.state.isBusy}
                onClick={this.save}
              >
                {osu.trans('common.buttons.save')}
              </button>
            </div>

            <div className='simple-form__button'>
              <button
                type='button'
                className='btn-osu-big btn-osu-big--rounded-thin'
                disabled={this.state.isBusy}
                onClick={this.props.onClose}
              >
                {osu.trans('common.buttons.cancel')}
              </button>
            </div>
          </div>
        </div>
      </form>
    );
  }

  private save = () => {
    this.setState({ isBusy: true });

    $.ajax(route('beatmapsets.update', { beatmapset: this.props.beatmapset.id }), {
      data: { beatmapset: {
        genre_id: this.state.genreId,
        language_id: this.state.languageId,
      } },
      method: 'PATCH',
    }).done((beatmapset: BeatmapsetJSON) => $.publish('beatmapset:set', { beatmapset }))
    .fail(osu.ajaxError)
    .always(() => this.setState({ isBusy: false }))
    .done(this.props.onClose);
  }

  private setGenreId = (e: React.ChangeEvent<HTMLSelectElement>) => {
    this.setState({ genreId: parseInt(e.currentTarget.value, 10) });
  }

  private setLanguageId = (e: React.ChangeEvent<HTMLSelectElement>) => {
    this.setState({ languageId: parseInt(e.currentTarget.value, 10) });
  }
}
