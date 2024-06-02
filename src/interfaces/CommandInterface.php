<?php

/**
 * Copyright 2024 bariscodefx
 * 
 * This file part of project Rockiest Discord Bot.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace rockiest\interfaces;

use rockiest\interfaces\RockiestInterface;

/**
 * CommandInterface
 */
interface CommandInterface
{
	/**
	 * configure
	 *
	 * @return void
	 */
	public function configure(): void;

	/**
	 * handle
	 *
	 * @param [type] $msg
	 * @param [type] $args
	 * @return void
	 */
	public function handle($msg, $args): void;

	/**
	 * __get
	 * 
	 * @param string $name
	 */
	public function __get(string $name);

}
