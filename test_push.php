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
    new RawMessageBuilder(
        [
            'type' => 'flex',
            'altText' => 'Shopping',
            'contents' => [
                'type' => 'carousel',
                'contents' => [
                    [
                        'type' => 'bubble',
                        'hero' => [
                            'type' => 'image',
                            'size' => 'full',
                            'aspectRatio' => '20:13',
                            'aspectMode' => 'cover',
                            'url' => 'https://example.com/photo1.png'
                        ],
                        'body' => [
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' => [
                                [
                                    'type' => 'text',
                                    'text' => 'Arm Chair, White',
                                    'wrap' => true,
                                    'weight' => 'bold',
                                    'size' => 'xl'
                                ],
                                [
                                    'type' => 'box',
                                    'layout' => 'baseline',
                                    'contents' => [
                                        [
                                            'type' => 'text',
                                            'text' => '$49',
                                            'wrap' => true,
                                            'weight' => 'bold',
                                            'size' => 'xl',
                                            'flex' => 0
                                        ],
                                        [
                                            'type' => 'text',
                                            'text' => '.99',
                                            'wrap' => true,
                                            'weight' => 'bold',
                                            'size' => 'sm',
                                            'flex' => 0
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        'footer' => [
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' => [
                                [
                                    'type' => 'button',
                                    'style' => 'primary',
                                    'action' => [
                                        'type' => 'uri',
                                        'label' => 'Add to Cart',
                                        'uri' => 'https://example.com'
                                    ]
                                ],
                                [
                                    'type' => 'button',
                                    'action' => [
                                        'type' => 'uri',
                                        'label' => 'Add to wishlist',
                                        'uri' => 'https://example.com'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'bubble',
                        'hero' => [
                            'type' => 'image',
                            'size' => 'full',
                            'aspectRatio' => '20:13',
                            'aspectMode' => 'cover',
                            'url' => 'https://example.com/photo2.png'
                        ],
                        'body' => [
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' => [
                                [
                                    'type' => 'text',
                                    'text' => 'Metal Desk Lamp',
                                    'wrap' => true,
                                    'weight' => 'bold',
                                    'size' => 'xl'
                                ],
                                [
                                    'type' => 'box',
                                    'layout' => 'baseline',
                                    'contents' => [
                                        [
                                            'type' => 'text',
                                            'text' => '$11',
                                            'wrap' => true,
                                            'weight' => 'bold',
                                            'size' => 'xl',
                                            'flex' => 0
                                        ],
                                        [
                                            'type' => 'text',
                                            'text' => '.99',
                                            'wrap' => true,
                                            'weight' => 'bold',
                                            'size' => 'sm',
                                            'flex' => 0
                                        ]
                                    ]
                                ],
                                [
                                    'type' => 'text',
                                    'text' => 'Temporarily out of stock',
                                    'wrap' => true,
                                    'size' => 'xxs',
                                    'margin' => 'md',
                                    'color' => '#ff5551',
                                    'flex' => 0
                                ]
                            ]
                        ],
                        'footer' => [
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' => [
                                [
                                    'type' => 'button',
                                    'style' => 'primary',
                                    'color' => '#aaaaaa',
                                    'action' => [
                                        'type' => 'uri',
                                        'label' => 'Add to Cart',
                                        'uri' => 'https://example.com'
                                    ]
                                ],
                                [
                                    'type' => 'button',
                                    'action' => [
                                        'type' => 'uri',
                                        'label' => 'Add to wishlist',
                                        'uri' => 'https://example.com'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'type' => 'bubble',
                        'body' => [
                            'type' => 'box',
                            'layout' => 'vertical',
                            'spacing' => 'sm',
                            'contents' => [
                                [
                                    'type' => 'button',
                                    'flex' => 1,
                                    'gravity' => 'center',
                                    'action' => [
                                        'type' => 'uri',
                                        'label' => 'See more',
                                        'uri' => 'https://example.com'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    )
);
$this->assertEquals(200, $res->getHTTPStatus());
$this->assertTrue($res->isSucceeded());
$this->assertEquals(200, $res->getJSONDecodedBody()['status']);

