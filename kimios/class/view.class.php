<?php
/*
 LICENSE

 This file is part of the Kimios Dolibarr module.

 Kimios Dolibarr module is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Kimios Dolibarr module is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Kimios Dolibarr module. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 @package   Kimios-Dolibarr
 @author    teclib (François Legastelois)
 @copyright Copyright (c) 2013 teclib'
 @license   GPLv2+
            http://www.gnu.org/licenses/gpl.txt
 @link      http://www.teclib.com
 @since     2013
 ---------------------------------------------------------------------- */
 
define('_KIMIOS_EXEC',true);

require_once DOL_DOCUMENT_ROOT.'/kimios/class/db.class.php';
require_once DOL_DOCUMENT_ROOT.'/kimios/class/config.class.php';
require_once DOL_DOCUMENT_ROOT.'/kimios/class/api/bootstrap.php';

class KimiosView {

	var $object = '';

	function getDocuments() {
		$KimiosConfig = new KimiosConfig();
		$KimiosConfig->getFromDB(1);

		$UserDolibarr 		= $user->login;
		$KimiosService 		= $KimiosConfig->fields['userName'];
		$KimiosServiceKey 	= $KimiosConfig->fields['password'];

		$KimiosPasswordChain = $KimiosService."|||".$KimiosServiceKey;

		$KimiosPhpSoap = new KimiosPhpSoap();
		$KimiosPhpSoap->connect(
			$KimiosConfig->fields['url'],
			$KimiosConfig->fields['userSource'],
			$UserDolibarr,
			$KimiosPasswordChain
		);

		$sessionId = $KimiosPhpSoap->getSessionId();

		
	}

	function showDocuments() {
		
	}

}