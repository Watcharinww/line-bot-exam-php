<?php
/**
 * Copyright 2018 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
namespace LINE\Tests\LINEBot;
require 'conn.php';

use LINE\LINEBot;
use LINE\LINEBot\Constant\Flex\ComponentLayout;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\Tests\LINEBot\Util\DummyHttpClient;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\BoxComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ButtonComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\IconComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ImageComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\TextComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\CarouselContainerBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\Constant\Flex\ComponentIconSize;
use LINE\LINEBot\Constant\Flex\ComponentImageSize;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectRatio;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectMode;
use LINE\LINEBot\Constant\Flex\ComponentFontSize;
use LINE\LINEBot\Constant\Flex\ComponentFontWeight;
use LINE\LINEBot\Constant\Flex\ComponentMargin;
use LINE\LINEBot\Constant\Flex\ComponentSpacing;
use LINE\LINEBot\Constant\Flex\ComponentButtonStyle;
use LINE\LINEBot\Constant\Flex\ComponentButtonHeight;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\SpacerComponentBuilder;
use LINE\LINEBot\Constant\Flex\ComponentSpaceSize;
use LINE\LINEBot\Constant\Flex\ComponentGravity;
use LINE\LINEBot\QuickReplyBuilder\ButtonBuilder\QuickReplyButtonBuilder;
use LINE\LINEBot\QuickReplyBuilder\QuickReplyMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

$pushId = 'U1b80d09ffe5c7f746850ca99a023d30b';
$httpClient = new CurlHTTPClient($access_token);
$bot = new LINEBot($httpClient, ['channelSecret' => $channelSecret]);
        $res = $bot->pushMessage(
            $pushId,
            FlexMessageBuilder::builder()
                ->setAltText('Shopping')
                ->setContents(
                    CarouselContainerBuilder::builder()
                        ->setContents([
                            BubbleContainerBuilder::builder()
                                ->setHero(
                                    ImageComponentBuilder::builder()
                                        ->setSize(ComponentImageSize::FULL)
                                        ->setAspectRatio(ComponentImageAspectRatio::R20TO13)
                                        ->setAspectMode(ComponentImageAspectMode::COVER)
                                        ->setUrl('https://example.com/photo1.png')
                                )
                                ->setBody(
                                    BoxComponentBuilder::builder()
                                        ->setLayout(ComponentLayout::VERTICAL)
                                        ->setSpacing(ComponentSpacing::SM)
                                        ->setContents([
                                            TextComponentBuilder::builder()
                                                ->setText('Arm Chair, White')
                                                ->setWrap(true)
                                                ->setWeight(ComponentFontWeight::BOLD)
                                                ->setSize(ComponentFontSize::XL),
                                            BoxComponentBuilder::builder()
                                                ->setLayout(ComponentLayout::BASELINE)
                                                ->setContents([
                                                    TextComponentBuilder::builder()
                                                        ->setText('$49')
                                                        ->setWrap(true)
                                                        ->setWeight(ComponentFontWeight::BOLD)
                                                        ->setSize(ComponentFontSize::XL)
                                                        ->setFlex(0),
                                                    TextComponentBuilder::builder()
                                                        ->setText('.99')
                                                        ->setWrap(true)
                                                        ->setWeight(ComponentFontWeight::BOLD)
                                                        ->setSize(ComponentFontSize::SM)
                                                        ->setFlex(0)
                                                ])
                                        ])
                                )
                                ->setFooter(
                                    BoxComponentBuilder::builder()
                                        ->setLayout(ComponentLayout::VERTICAL)
                                        ->setSpacing(ComponentSpacing::SM)
                                        ->setContents([
                                            ButtonComponentBuilder::builder()
                                                ->setStyle(ComponentButtonStyle::PRIMARY)
                                                ->setAction(
                                                    new UriTemplateActionBuilder(
                                                        'Add to Cart',
                                                        'https://example.com'
                                                    )
                                                ),
                                            ButtonComponentBuilder::builder()
                                                ->setAction(
                                                    new UriTemplateActionBuilder(
                                                        'Add to wishlist',
                                                        'https://example.com'
                                                    )
                                                )
                                        ])
                                ),
                            BubbleContainerBuilder::builder()
                                ->setHero(
                                    ImageComponentBuilder::builder()
                                        ->setSize(ComponentImageSize::FULL)
                                        ->setAspectRatio(ComponentImageAspectRatio::R20TO13)
                                        ->setAspectMode(ComponentImageAspectMode::COVER)
                                        ->setUrl('https://example.com/photo2.png')
                                )
                                ->setBody(
                                    BoxComponentBuilder::builder()
                                        ->setLayout(ComponentLayout::VERTICAL)
                                        ->setSpacing(ComponentSpacing::SM)
                                        ->setContents([
                                            TextComponentBuilder::builder()
                                                ->setText('Metal Desk Lamp')
                                                ->setWrap(true)
                                                ->setWeight(ComponentFontWeight::BOLD)
                                                ->setSize(ComponentFontSize::XL),
                                            BoxComponentBuilder::builder()
                                                ->setLayout(ComponentLayout::BASELINE)
                                                ->setContents([
                                                    TextComponentBuilder::builder()
                                                        ->setText('$11')
                                                        ->setWrap(true)
                                                        ->setWeight(ComponentFontWeight::BOLD)
                                                        ->setSize(ComponentFontSize::XL)
                                                        ->setFlex(0),
                                                    TextComponentBuilder::builder()
                                                        ->setText('.99')
                                                        ->setWrap(true)
                                                        ->setWeight(ComponentFontWeight::BOLD)
                                                        ->setSize(ComponentFontSize::SM)
                                                        ->setFlex(0)
                                                ]),
                                            TextComponentBuilder::builder()
                                                ->setText('Temporarily out of stock')
                                                ->setWrap(true)
                                                ->setSize(ComponentFontSize::XXS)
                                                ->setMargin(ComponentMargin::MD)
                                                ->setColor('#ff5551')
                                                ->setFlex(0)
                                        ])
                                )
                                ->setFooter(
                                    BoxComponentBuilder::builder()
                                        ->setLayout(ComponentLayout::VERTICAL)
                                        ->setSpacing(ComponentSpacing::SM)
                                        ->setContents([
                                            ButtonComponentBuilder::builder()
                                                ->setStyle(ComponentButtonStyle::PRIMARY)
                                                ->setColor('#aaaaaa')
                                                ->setAction(
                                                    new UriTemplateActionBuilder(
                                                        'Add to Cart',
                                                        'https://example.com'
                                                    )
                                                ),
                                            ButtonComponentBuilder::builder()
                                                ->setAction(
                                                    new UriTemplateActionBuilder(
                                                        'Add to wishlist',
                                                        'https://example.com'
                                                    )
                                                )
                                        ])
                                ),
                            BubbleContainerBuilder::builder()
                                ->setBody(
                                    BoxComponentBuilder::builder()
                                        ->setLayout(ComponentLayout::VERTICAL)
                                        ->setSpacing(ComponentSpacing::SM)
                                        ->setContents([
                                            ButtonComponentBuilder::builder()
                                                ->setFlex(1)
                                                ->setGravity(ComponentGravity::CENTER)
                                                ->setAction(
                                                    new UriTemplateActionBuilder(
                                                        'See more',
                                                        'https://example.com'
                                                    )
                                                )
                                        ])
                                )
                        ])
                )
        );
        $this->assertEquals(200, $res->getHTTPStatus());
        $this->assertTrue($res->isSucceeded());
        $this->assertEquals(200, $res->getJSONDecodedBody()['status']);