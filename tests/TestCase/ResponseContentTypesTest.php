<?php

/*
 * This file is part of the Rest-Control package.
 *
 * (c) Kamil Szela <kamil.szela@cothe.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RestControl\Tests\TestCase;

use RestControl\TestCase\ChainObject;
use RestControl\TestCase\ExpressionLanguage\ContainsString;
use RestControl\TestCase\ExpressionLanguage\Expression;
use RestControl\TestCase\Response;
use PHPUnit\Framework\TestCase;
use RestControl\TestCase\ResponseFilters\ContentTypeFilter;

class ResponseContentTypesTest extends TestCase
{
    public function testContentTypes()
    {
        $contentTypes  = [
            [
                'audio/aac',
                'contentTypeAudioAac',
            ],

            [
                'application/x-abiword',
                'contentTypeApplicationXAbiword',
            ],

            [
                'application/octet-stream',
                'contentTypeApplicationOctetStream',
            ],

            [
                'video/x-msvideo',
                'contentTypeVideoXMsvideo',
            ],

            [
                'application/vnd.amazon.ebook',
                'contentTypeApplicationVndAmazonEbook',
            ],

            [
                'application/x-bzip',
                'contentTypeApplicationXBzip',
            ],

            [
                'application/x-bzip2',
                'contentTypeApplicationXBzip2',
            ],

            [
                'application/x-csh',
                'contentTypeApplicationXCsh',
            ],

            [
                'text/css',
                'contentTypeTextCss',
            ],

            [
                'text/csv',
                'contentTypeTextCsv',
            ],

            [
                'application/msword',
                'contentTypeApplicationMsword',
            ],

            [
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'contentTypeApplicationVndOpenxmlformatsOfficedocumentWordprocessingmlDocument',
            ],

            [
                'application/vnd.ms-fontobject',
                'contentTypeApplicationVndMsFontobject',
            ],

            [
                'application/epub+zip',
                'contentTypeApplicationEpubZip',
            ],

            [
                'application/ecmascript',
                'contentTypeApplicationEcmascript',
            ],
            [
                'image/gif',
                'contentTypeImageGif',
            ],

            [
                'text/html',
                'contentTypeTextHtml',
            ],

            [
                'image/x-icon',
                'contentTypeImageXIcon',
            ],

            [
                'text/calendar',
                'contentTypeTextCalendar',
            ],

            [
                'application/java-archive',
                'contentTypeApplicationJavaArchive',
            ],

            [
                'image/jpeg',
                'contentTypeImageJpeg',
            ],

            [
                'application/javascript',
                'contentTypeApplicationJavascript',
            ],

            [
                'application/json',
                'contentTypeApplicationJson',
            ],

            [
                'audio/midi',
                'contentTypeAudioMidi',
            ],

            [
                'video/mpeg',
                'contentTypeVideoMpeg',
            ],

            [
                'application/vnd.apple.installer+xml',
                'contentTypeApplicationVndAppleInstallerXml',
            ],

            [
                'application/vnd.oasis.opendocument.presentation',
                'contentTypeApplicationVndOasisOpendocumentPresentation',
            ],

            [
                'application/vnd.oasis.opendocument.spreadsheet',
                'contentTypeApplicationVndOasisOpendocumentSpreadsheet',
            ],

            [
                'application/vnd.oasis.opendocument.text',
                'contentTypeApplicationVndOasisOpendocumentText',
            ],

            [
                'audio/ogg',
                'contentTypeAudioOgg',
            ],


            [
                'video/ogg',
                'contentTypeVideoOgg',
            ],

            [
                'application/ogg',
                'contentTypeApplicationOgg',
            ],

            [
                'font/otf',
                'contentTypeFontOtf',
            ],

            [
                'image/png',
                'contentTypeImagePng',
            ],

            [
                'application/pdf',
                'contentTypeApplicationPdf',
            ],

            [
                'application/vnd.ms-powerpoint',
                'contentTypeApplicationVndMsPowerpoint',
            ],

            [
                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'contentTypeApplicationVndOpenxmlformatsOfficedocumentPresentationmlPresentation',
            ],

            [
                'application/x-rar-compressed',
                'contentTypeApplicationXRarCompressed',
            ],

            [
                'application/rtf',
                'contentTypeApplicationRtf',
            ],

            [
                'application/x-sh',
                'contentTypeApplicationXSh',
            ],

            [
                'image/svg+xml',
                'contentTypeImageSvgXml',
            ],

            [
                'application/x-shockwave-flash',
                'contentTypeApplicationXShockwaveFlash',
            ],

            [
                'application/x-tar',
                'contentTypeApplicationXTar',
            ],

            [
                'image/tiff',
                'contentTypeImageTiff',
            ],

            [
                'application/typescript',
                'contentTypeApplicationTypescript',
            ],

            [
                'font/ttf',
                'contentTypeFontTtf',
            ],

            [
                'application/vnd.visio',
                'contentTypeApplicationVndVisio',
            ],

            [
                'audio/x-wav',
                'contentTypeAudioXWav',
            ],

            [
                'audio/webm',
                'contentTypeAudioWebm',
            ],

            [
                'video/webm',
                'contentTypeVideoWebm',
            ],

            [
                'image/webp',
                'contentTypeImageWebp',
            ],

            [
                'font/woff',
                'contentTypeFontWoff',
            ],

            [
                'font/woff2',
                'contentTypeFontWoff2',
            ],

            [
                'application/xhtml+xml',
                'contentTypeApplicationXhtmlXml',
            ],

            [
                'application/vnd.ms-excel',
                'contentTypeApplicationVndMsExcel',
            ],

            [
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'contentTypeApplicationVndOpenxmlformatsOfficedocumentSpreadsheetmlSheet',
            ],

            [
                'application/xml',
                'contentTypeApplicationXml',
            ],

            [
                'application/vnd.mozilla.xul+xml',
                'contentTypeApplicationVndMozillaXulXml',
            ],

            [
                'application/zip',
                'contentTypeApplicationZip',
            ],

            [
                'video/3gpp',
                'contentTypeVideo3gpp',
            ],

            [
                'audio/3gpp',
                'contentTypeAudio3gpp',
            ],

            [
                'video/3gpp2',
                'contentTypeVideo3gpp2',
            ],

            [
                'audio/3gpp2',
                'contentTypeAudio3gpp2',
            ],

            [
                'application/x-7z-compressed',
                'contentTypeApplicationX7zCompressed',
            ],
        ];

        foreach($contentTypes as $contentTypeConf) {

            $response = new Response();
            $response->{$contentTypeConf[1]}();

            $this->assertSame(1, $response->_getChainLength());

            $chainObjects = $response->_getChainObjects(ContentTypeFilter::FILTER_NAME);
            $this->assertCount(1, $chainObjects);
            $this->assertInstanceOf(ChainObject::class, $chainObjects[0]);

            /** @var ChainObject $chainObject */
            $chainObject = $chainObjects[0];
            /** @var Expression $expression */
            $expression  = $chainObject->getParam(0);

            $this->assertInstanceOf(Expression::class, $expression);
            $this->assertSame(ContainsString::FILTER_NAME, $expression->getName());
            $this->assertSame($contentTypeConf[0], $expression->getParam(0));
        }
    }
}