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

include __DIR__ . '/vendor/autoload.php';

use Discord\Parts\Interactions\Interaction;
use rockiest\Rockiest;
use Discord\Parts\User\Activity;
use rockiest\parts\CommandLoader;
use rockiest\parts\ArgumentParser;
use rockiest\parts\PresenceManager;
use Discord\WebSockets\Intents;
use rockiest\Version;
use Discord\WebSockets\Event;

if (!isset ($_ENV['TOKEN'])) {
    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();
}

if (Version::TYPE == 'development') {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

$ArgumentParser = new ArgumentParser($argv);
$shard_id = $ArgumentParser->getShardId();
$shard_count = $ArgumentParser->getShardCount();
$bot = new Rockiest([
    'token' => $_ENV['TOKEN'],
    'prefix' => $_ENV['PREFIX'],
    'shardId' => $shard_id,
    'shardCount' => $shard_count,
    'caseInsensitiveCommands' => true,
    'loadAllMembers' => @$_ENV['LOAD_ALL_MEMBERS'] ? true : false,
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS | Intents::MESSAGE_CONTENT | Intents::GUILDS
]);
$voiceSettings = [];

function getPresenceState(): ?array
{
    return [
        "Rockiest ❤️",
    ];
}

$bot->on('ready', function ($discord) {
    $discord->logger->pushHandler(new \Monolog\Handler\StreamHandler('bot.log', \Monolog\Level::Info));
    $colors = new Wujunze\Colors;
    echo $colors->getColoredString("Bot's ready event hooked.", "black", "green"), PHP_EOL;

    $commandLoader = new CommandLoader($discord);

    $presenceManager = new PresenceManager($discord);
    $presenceManager->setLoopTime(15.0)
        ->setPresenceType(Activity::TYPE_WATCHING)
        ->setPresences(getPresenceState())
        ->startThread();

    /** fix discord guild count */
    $discord->getLoop()->addPeriodicTimer($presenceManager->looptime, function () use ($presenceManager, $discord) {
        $presenceManager->setPresences(getPresenceState());
    });

});

$bot->on(Event::INTERACTION_CREATE, function (Interaction $event) {

    switch ($event->data->custom_id) {
        case "gender.select":
            if ($event->guild_id != "1219964260822679643")
                return;

            $roles = [
                "male" => "1220478384904339486",
                "female" => "1220478474158997604"
            ];

            $event->member->removeRole('1220419479658434610')->always(function () use ($event, $roles) {
                $event->member->addRole('1220463004118683768')->always(
                    function () use ($event, $roles) {
                        foreach ($event->member->roles as $role) {
                            if (in_array($role->id, $roles)) {
                                $event->member->removeRole($role->id)->always(function () use ($event, $roles) {
                                    $event->member->addRole($roles[$event->data->values[0]])->then(function () use ($event) {
                                        $event->acknowledge();
                                    });
                                });
                                return;
                            }
                        }
                        $event->member->addRole($roles[$event->data->values[0]])->always(function () use ($event) {
                            $event->acknowledge();
                        });
                    }
                );
            });
            break;
        case "color.select":
            if ($event->guild_id != "1219964260822679643")
                return;

            $roles = [
                "red" => "1220813059514437723",
                "green" => "1220813138790973572",
                "blue" => "1220813134042759339",
                "yellow" => "1220819082496970813",
                "black" => "1220820215252648067",
                "purple" => "1220828221910548610",
                "gray" => "1220828723322949643",
                "orange" => "1220828645363417289",
                "turquoise" => "1220828844609503395",
                "neongreen" => "1220829788978024670",
                "lightpurple" => "1220830735078916141"
            ];

            $event->acknowledge();

            foreach ($event->member->roles as $role) {
                if (in_array($role->id, $roles)) {
                    $event->member->removeRole($role->id)->then(function () use ($event, $roles) {
                        $event->member->addRole($roles[$event->data->values[0]]);
                    });
                    return;
                }
            }

            $event->member->addRole($roles[$event->data->values[0]]);
            break;

        case "zodiac.select":
            if ($event->guild_id != "1219964260822679643")
                return;

            $roles = [
                "aries" => "1221154386177425568", // koç
                "taurus" => "1221154496420253726", // boğa
                "gemini" => "1221154553144152114", // ikizler
                "cancer" => "1221155217249271830", // yengeç
                "leo" => "1221155282554585098", // aslan
                "virgo" => "1221155326624141394", // başak
                "libra" => "1221155376268050534", // terazi
                "scorpio" => "1221155463975010486", // akrep
                "sagittarius" => "1221156177216278679", // yay
                "capricorn" => "1221155495704924351", // oğlak
                "aquarius" => "1221156548471160853", // kova
                "pisces" => "1221156640389075006" // balık
            ];

            $event->acknowledge();

            foreach ($event->member->roles as $role) {
                if (in_array($role->id, $roles)) {
                    $event->member->removeRole($role->id)->then(function () use ($event, $roles) {
                        $event->member->addRole($roles[$event->data->values[0]]);
                    });
                    return;
                }
            }

            $event->member->addRole($roles[$event->data->values[0]]);
            break;

        case "age.select":
            if ($event->guild_id != "1219964260822679643")
                return;

            $roles = [
                "14" => "1246806490006683750",
                "15" => "1246806526564372480",
                "16" => "1246806607153594509",
                "17" => "1246806623549390980",
                "18" => "1246806651260899328",
                "19" => "1246806669128765511",
                "20" => "1246806684781908019",
                "21" => "1246806701059866694",
                "22+" => "1246806714263539763"
            ];

            $event->acknowledge();

            foreach ($event->member->roles as $role) {
                if (in_array($role->id, $roles)) {
                    $event->member->removeRole($role->id)->then(function () use ($event, $roles) {
                        $event->member->addRole($roles[$event->data->values[0]]);
                    });
                    return;
                }
            }

            $event->member->addRole($roles[$event->data->values[0]]);
            break;
    }
});

$bot->run();
