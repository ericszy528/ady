<?php
namespace app\admin\controller;


class Mizhiady extends Base
	{
		public function mzadyset()
		{
			if (Request()->isPost()) {
				$config = input();
				$config_new["mzadycms"] = $config["mzadycms"];
				$config_old = config("mzadydata");
				$config_new = array_merge($config_old, $config_new);
				$res = mac_arr2file(APP_PATH . "extra/mzadydata.php", $config_new);
				if ($res === false) {
					return $this->error("爱电影保存失败，请重试!");
				}
				return $this->success("爱电影保存成功!");
			}
			$this->assign("config", config("mzadydata"));
			return $this->fetch("admin@system/mzadycms");
		}
	}
