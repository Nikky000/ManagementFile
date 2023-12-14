<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: dilesh chouhan <dileshchouhan86@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\ManagementFile\Tests\Unit\Controller;

use OCA\ManagementFile\Controller\NoteApiController;

class NoteApiControllerTest extends NoteControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new NoteApiController($this->request, $this->service, $this->userId);
	}
}
