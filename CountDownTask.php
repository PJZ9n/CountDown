<?php
	/*******************************************************************************
	 * Copyright © 2019 PJSoft All Rights Reserved.
	 *
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 ******************************************************************************/
	
	namespace CountDown;
	
	use pocketmine\scheduler\Task;
	
	class CountDownTask extends Task {
		
		/** @var Main メインクラス */
		private $owner;
		
		/** @var int カウント */
		private $count;
		
		public function __construct(Main $owner) {
			//メインクラスを入れる
			$this->owner = $owner;
			//カウントダウンを5秒にする
			$this->count = 5;
		}
		
		public function onRun(int $currentTick): void {
			//カウントが0秒だったら
			if ($this->count === 0) {
				//コンソールにメッセージを送る
				$this->owner->getLogger()->info("カウント終了しました");
				//タスクを終了する
				$this->getHandler()->cancel();
			}
			//コンソールにメッセージを送る
			$this->owner->getLogger()->info("カウント：{$this->count}");
			//カウントを1減らす
			$this->count--;
		}
		
	}