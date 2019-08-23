<?php

/**
 *    Copyright (c) ppy Pty Ltd <contact@ppy.sh>.
 *
 *    This file is part of osu!web. osu!web is distributed with the hope of
 *    attracting more community contributions to the core ecosystem of osu!.
 *
 *    osu!web is free software: you can redistribute it and/or modify
 *    it under the terms of the Affero GNU General Public License version 3
 *    as published by the Free Software Foundation.
 *
 *    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
 *    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *    See the GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Tests\Score;

use App\Exceptions\ClassNotFoundException;
use App\Models\Beatmap;
use App\Models\Score\Model;
use TestCase;

class ModelTest extends TestCase
{
    public function testGetClassByString()
    {
        $modes = array_keys(Beatmap::MODES);
        foreach ($modes as $mode) {
            $class = Model::getClassByString($mode);
            $this->assertInstanceOf(Model::class, new $class);
        }
    }

    /**
     * @dataProvider modes
     */
    public function testGetClassByStringThrowsExceptionIfModeDoesNotExist($mode)
    {
        $this->expectException(ClassNotFoundException::class);
        Model::getClassByString($mode);
    }

    public function modes()
    {
        return [
            ['does'],
            ['not exist'],
            ['not_real'],
            ['best\\_osu'],
        ];
    }
}
