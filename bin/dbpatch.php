#!/usr/bin/env php
<?php
/**
 * SURFconext EngineBlock
 *
 * LICENSE
 *
 * Copyright 2011 SURFnet bv, The Netherlands
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and limitations under the License.
 *
 * @category  SURFconext EngineBlock
 * @package
 * @copyright Copyright © 2010-2011 SURFnet SURFnet bv, The Netherlands (http://www.surfnet.nl)
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 */

set_include_path(realpath(__DIR__ . '/../vendor/dbpatch/dbpatch/src/') . PATH_SEPARATOR . get_include_path());

// Include SSP
require __DIR__ . '/../www/_include.php';

// Include Zend Autoloader
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('DbPatch_');
$autoloader->registerNamespace('ServiceRegistry_');

// Start DbPatch
require_once __DIR__ . "/../lib/ServiceRegistry/DbPatch/Core/Application.php";
$application = new ServiceRegistry_DbPatch_Core_Application();
$application->main();