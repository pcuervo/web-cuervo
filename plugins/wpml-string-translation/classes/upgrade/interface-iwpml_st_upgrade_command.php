<?php

interface IWPML_St_Upgrade_Command {

	public function run();

	public function run_ajax();

	public function run_frontend();
}