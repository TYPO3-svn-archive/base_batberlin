<?php

  /////////////////////////////////////////////////
  //
  // Organiser (org) Language configuration by the extension manager
  // Add static templates
  // Add a default page TSConfig 
  // Modify TCA
  // Add a default TSconfig to every user
  // * TCAdefaults
  //   * tx_org_cal
  //   * tx_org_calentrance
  // Configure third party tables
  //   * tx_org_cal
  //   * tx_org_calentrance
  //   * tx_org_caltype
  //   * tx_org_repertoire



if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}



  /////////////////////////////////////////////////
  // 
  // Organiser (org) Language configuration by the extension manager
  
$confArr  = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

  // Language for labels of static templates and page tsConfig
$llStatic = $confArr['LLstatic'];
switch($llStatic) {
  case($llStatic == 'German'):
    $llStatic = 'de';
    break;
  default:
    $llStatic = 'default';
}
  // Language for labels of static templates and page tsConfig
  // Configuration by the extension manager



  /////////////////////////////////////////////////
  //
  // Add static templates

  // bat template
t3lib_extMgm::addStaticFile($_EXTKEY,'static/lib/',                 'BAT: Library');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/',                     '+BAT: Template');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/css_styled_content/',  '+BAT: CSS Styled Content');

  // bat organiser
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/department/601/',        '+BAT: +Org Abteilung');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/calendar/201/',          '+BAT: +Org Kalender');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/calendar/201/expired/',  '+BAT: +Org Kalender +Archiv');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/calendar/211/',          '+BAT: +Org Kalender - Rand');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/repertoire/331/',        '+BAT: +Org Repertoire');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/headquarters/501/',      '+BAT: +Org Standort');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/shopping_cart/801/',     '+BAT: +Org Warenkorb');
t3lib_extMgm::addStaticFile($_EXTKEY,'static/org/shopping_cart/811/',     '+BAT: +Org Warenkorb - Rand');

  // Add static templates



  /////////////////////////////////////////////////
  //
  // Add default page and user TSconfig

  // File isn't depending of language
t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/tsConfig/page.txt">');
  // File depends of language
t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/tsConfig/' . $llStatic . '/page.txt">');
  // Add default page and user TSconfig



  /////////////////////////////////////////////////
  //
  // Configure third party tables

  // tx_org_cal
t3lib_div::loadTCA('tx_org_cal');
$TCA['tx_org_cal']['ctrl']['title']                         = 'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_cal';
$TCA['tx_org_cal']['columns']['management']['label']        = 'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_cal.management';
$TCA['tx_org_cal']['types']['0']['showitem']                = str_replace (
                                                                'LLL:EXT:org/locallang_db.xml:tx_org_cal.div_management',
                                                                'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_cal.div_management',
                                                                $TCA['tx_org_cal']['types']['0']['showitem']
                                                              );
  // tx_org_calentrance
t3lib_div::loadTCA('tx_org_calentrance');
$TCA['tx_org_calentrance']['ctrl']['title']                 = 'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_calentrance';

  // tx_org_caltype
t3lib_div::loadTCA('tx_org_caltype');
$TCA['tx_org_caltype']['ctrl']['title']                     = 'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_caltype';
$TCA['tx_org_caltype']['columns']['calendar']['label']      = 'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_caltype.calendar';
$TCA['tx_org_caltype']['types']['0']['showitem']            = str_replace (
                                                                'LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_calendar',
                                                                'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_caltype.div_calendar',
                                                                $TCA['tx_org_caltype']['types']['0']['showitem']
                                                              );

  // tx_org_repertoire
t3lib_div::loadTCA('tx_org_repertoire');
$TCA['tx_org_repertoire']['columns']['subtitle']['label']   = 'LLL:EXT:base_batberlin/locallang_db.xml:tx_org_repertoire.subtitle';
  // Configure third party tables

?>