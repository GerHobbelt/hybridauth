<?php
/**
 * Copyright (c)2013-2013 heiglandreas
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIBILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category  HybridAuth
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     11.01.13
 * @link      https://github.com/heiglandreas/
 */

namespace OrgHeiglHybridAuthTest;

use \PHPUnit_Framework_TestCase;
use \OrgHeiglHybridAuth\UserWrapperFactory;
use \Hybridauth\Entity\Profile;


class UserProxyFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreationWithKnownUserObject()
    {
        $factory = new UserWrapperFactory();
        $userObj = new Profile();
        $obj = $factory->factory($userObj);
        $this->assertInstanceof('\OrgHeiglHybridAuth\UserInterface', $obj);
    }

    public function testCreationWithUnknownUserObject()
    {
        $factory = new UserWrapperFactory();
        $userObj = $this->getMock('Hybridauth\\Entity\\Profile');
        $obj = $factory->factory($userObj);
        $this->assertInstanceof('\OrgHeiglHybridAuth\UserInterface', $obj);
        $this->assertInstanceof('\OrgHeiglHybridAuth\DummyUserWrapper', $obj);
    }
}
