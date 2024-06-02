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

namespace rockiest\commands;

use rockiest\interfaces\CommandInterface;
use rockiest\interfaces\RockiestInterface;
use Discord\Discord;
use rockiest\parts\CommandLoader;

/**
 * Command
 */
class Command implements CommandInterface {

    /**
     * category
     * 
     * @var string
     */
    public $category;
    
    /**
     * command
     * 
     * @var string
     */
    public $command;

    /**
     * description
     * 
     * @var string
     */
    public $description = "Undefined description.";

    /**
     * aliases
     *
     * @var array
     */
    public $aliases = [];

    /**
     * CommandLoader
     *
     * @var \rockiest\parts\CommandLoader
     */
    public $loader;

    /**
     * discord
     * 
     * @var Discord
     */
    public $discord;

    /**
     * cooldown
     *
     * @var int
     */
    public $cooldown = 0;
    
    /**
     * __construct
     */
    public function __construct(RockiestInterface $client, CommandLoader $loader)
    {
        $this->discord = $client;
        $this->loader = $loader;
        $this->cooldown = 3 * 1000;

        $this->configure(); // we can use like this on child classes
    }

    /**
     * configure
     *
     * This is calling by __construct
     * 
     * @return void
     */
    public function configure(): void
    {
        $this->category = "default";
    }

    /**
     * handle
     *
     * @param [type] $msg
     * @param [type] $args
     * @return void
     */
    public function handle($msg, $args): void
    {
        
    }

    /**
     * __get
     *
     * @param string $name
     * @return void
     */
    public function __get(string $name)
    {
        return $this->{$name} ?? null;
    }

}