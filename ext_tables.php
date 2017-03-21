<?php
defined('TYPO3_MODE') || die('Access denied.');

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'FRD.' . $_EXTKEY,
        'web',
        'modQueryBugModule',
        '',
        [
            'QueryTest' => 'index,create'
        ],
        [
            'access' => 'user,group',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf'
        ]
    );
}
