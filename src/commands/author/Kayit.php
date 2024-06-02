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

use Discord\Builders\Components\ActionRow;
use Discord\Builders\Components\Button;
use Discord\Builders\Components\TextInput;
use rockiest\security\AuthorCommand;
use Discord\Builders\MessageBuilder;
use Discord\Builders\Components\StringSelect;
use Discord\Builders\Components\Option;

/**
 * Kayit
 */
class Kayit extends AuthorCommand
{
    /**
     * configure
     *
     * @return void
     */
    public function configure(): void
    {
        $this->command = "kayit";
        $this->description = "kayıt menüleri oluştur";
        $this->aliases = ["kayıt"];
        $this->category = "author";
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
        if (@$args[0]) {
            if($args[0] === "cinsiyet") {
                $builder = MessageBuilder::new();
                // kullanıcıya aşağıdaki butonları kullanarak cinsiyetiyle birlikte kayıt olması gerektiğini açıkla
                $builder->setContent("Kayıt olmak için aşağıdaki butonlardan birini seçerek cinsiyetinizi belirtin.\n\n**Not:** Kayıt olmak için cinsiyetinizi belirtmeniz gerekmektedir.");
                // add button
                $builder->addComponent(
                    StringSelect::new()
                        ->setPlaceholder("Cinsiyet Seç")
                        ->setCustomId("gender.select")
                        ->addOption(
                            Option::new("Erkek", "male")
                                ->setDescription("Erkek rolü seç")
                                ->setEmoji("👨")
                        )
                        ->addOption(
                            Option::new("Kadın", "female")
                                ->setDescription("Kadın rolü seç")
                                ->setEmoji("👩")
                        )
                );
                $msg->channel->sendMessage($builder);
            }

            if($args[0] === "renk") {
                $builder = MessageBuilder::new();
                // kullanıcı isterse renkli bir rol seçebilir
                $builder->setContent("İsminize göre bir renk seçebilirsiniz.\n\n**Not:** Renkli rol seçmek istemiyorsanız bu mesajı görmezden gelebilirsiniz.");
                // add button
                $builder->addComponent(
                    StringSelect::new()
                        ->setPlaceholder("Renk Seç")
                        ->setCustomId("color.select")
                        ->addOption(
                            Option::new("Mavi", "blue")
                                ->setDescription("Mavi rolü seç")
                                ->setEmoji("🔵")
                        )
                        ->addOption(
                            Option::new("Kırmızı", "red")
                                ->setDescription("Kırmızı rolü seç")
                                ->setEmoji("🔴")
                        )
                        ->addOption(
                            Option::new("Yeşil", "green")
                                ->setDescription("Yeşil rolü seç")
                                ->setEmoji("🟢")
                        )
                        ->addOption(
                            Option::new("Sarı", "yellow")
                                ->setDescription("Sarı rolü seç")
                                ->setEmoji("🟡")
                        )
                        ->addOption(
                            Option::new("Siyah", "black")
                                ->setDescription("Siyah rolü seç")
                                ->setEmoji("⚫")
                        )
                        ->addOption(
                            Option::new("Mor", "purple")
                                ->setDescription("Mor rolü seç")
                                ->setEmoji("🟣")
                        )
                        ->addOption(
                            Option::new("Gri", "gray")
                                ->setDescription("Gri rolü seç")
                                ->setEmoji("⚪")
                        )
                        ->addOption(
                            Option::new("Turkuaz", "turquoise")
                                ->setDescription("Turkuaz rolü seç")
                                ->setEmoji("🟦")
                        )
                        ->addOption(
                            Option::new("Turuncu", "orange")
                                ->setDescription("Turuncu rolü seç")
                                ->setEmoji("🟧")
                        )
                        ->addOption(
                            Option::new("Neon Yeşil", "neongreen")
                                ->setDescription("Neon Yeşil rolü seç")
                                ->setEmoji("💚")
                        )
                        ->addOption(
                            Option::new("Açık Mor", "lightpurple")
                                ->setDescription("Açık Mor rolü seç")
                                ->setEmoji("🟪")
                        )
                );
                $msg->channel->sendMessage($builder);
            }


            if($args[0] === "burç") {
                $builder = MessageBuilder::new();
                // kullanıcıya isteğe bağlı olarak burcunu seçebilir
                $builder->setContent("Burcunuzu seçerek burcunuza özel bir rol alabilirsiniz.\n\n**Not:** Burcunuzu seçmek istemiyorsanız bu mesajı görmezden gelebilirsiniz.");
                // add button
                $builder->addComponent(
                    StringSelect::new()
                        ->setPlaceholder("Burç Seç")
                        ->setCustomId("zodiac.select")
                        ->addOption(
                            Option::new("Koç", "aries")
                                ->setDescription("Koç burcu rolü seç")
                                ->setEmoji("♈")
                        )
                        ->addOption(
                            Option::new("Boğa", "taurus")
                                ->setDescription("Boğa burcu rolü seç")
                                ->setEmoji("♉")
                        )
                        ->addOption(
                            Option::new("İkizler", "gemini")
                                ->setDescription("İkizler burcu rolü seç")
                                ->setEmoji("♊")
                        )
                        ->addOption(
                            Option::new("Yengeç", "cancer")
                                ->setDescription("Yengeç burcu rolü seç")
                                ->setEmoji("♋")
                        )
                        ->addOption(
                            Option::new("Aslan", "leo")
                                ->setDescription("Aslan burcu rolü seç")
                                ->setEmoji("♌")
                        )
                        ->addOption(
                            Option::new("Başak", "virgo")
                                ->setDescription("Başak burcu rolü seç")
                                ->setEmoji("♍")
                        )
                        ->addOption(
                            Option::new("Terazi", "libra")
                                ->setDescription("Terazi burcu rolü seç")
                                ->setEmoji("♎")
                        )
                        ->addOption(
                            Option::new("Akrep", "scorpio")
                                ->setDescription("Akrep burcu rolü seç")
                                ->setEmoji("♏")
                        )
                        ->addOption(
                            Option::new("Yay", "sagittarius")
                                ->setDescription("Yay burcu rolü seç")
                                ->setEmoji("♐")
                        )
                        ->addOption(
                            Option::new("Oğlak", "capricorn")
                                ->setDescription("Oğlak burcu rolü seç")
                                ->setEmoji("♑")
                        )
                        ->addOption(
                            Option::new("Kova", "aquarius")
                                ->setDescription("Kova burcu rolü seç")
                                ->setEmoji("♒")
                        )
                        ->addOption(
                            Option::new("Balık", "pisces")
                                ->setDescription("Balık burcu rolü seç")
                                ->setEmoji("♓")
                        )
                );
                $msg->channel->sendMessage($builder);
            }

            if ($args[0] === "yaş") {
                $builder = MessageBuilder::new();
                // kullanıcıya isteğe bağlı olarak yaşını seçebilir
                $builder->setContent("Yaşınızı seçerek yaşınıza özel bir rol alabilirsiniz.");
                // add button
                $builder->addComponent(
                    StringSelect::new()
                        ->setPlaceholder("Yaş Seç")
                        ->setCustomId("age.select")
                        ->addOption(
                            Option::new("14", "14")
                                ->setDescription("14 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("15", "15")
                                ->setDescription("15 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("16", "16")
                                ->setDescription("16 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("17", "17")
                                ->setDescription("17 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("18", "18")
                                ->setDescription("18 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("19", "19")
                                ->setDescription("19 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("20", "20")
                                ->setDescription("20 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("21", "21")
                                ->setDescription("21 yaş rolü seç")
                        )
                        ->addOption(
                            Option::new("22+", "22+")
                                ->setDescription("22+ yaş rolü seç")
                        )
                );
                $msg->channel->sendMessage($builder);
            }
        }
    }
}
