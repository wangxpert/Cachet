<?php

	use \BadConfigKeyException;

	class Setting extends Eloquent {
		/**
		 * Returns a setting from the database.
		 * @param  string $settingName
		 * @param  bool $checkEnv
		 * @return string
		 */
		public static function get($settingName, $checkEnv = true) {
			// Default setting value.
			$setting = null;

			// First try finding the setting in the database.
			try {
				$setting = self::whereName($settingName)->first()->value;
			} catch (\ErrorException $e) {
				// If we don't have a setting, check the env (fallback for original version)
				if ($checkEnv) {
					if (!($setting = getenv(strtoupper($settingName)))) {
						self::unknownSettingException($settingName);
					}
				} else {
					self::unknownSettingException($settingName);
				}
			}

			return $setting;
		}

		/**
		 * Throws an BadConfigKeyException
		 * @param  string $setting
		 * @throws BadConfigKeyException
		 * @return void
		 */
		public static function unknownSettingException($setting) {
			throw new BadConfigKeyException(
				sprintf('Unknown setting %s', $settingName)
			);
		}
	}
