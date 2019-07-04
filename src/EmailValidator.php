<?php

declare(strict_types=1);

namespace SPakV;

/**
 * Email validator.
 */
class EmailValidator {

	/**
	 * Validate email.
	 *
	 * @param string $email Email
	 *
	 * @return bool
	 */
	public static function validate(string $email): bool {
		$regExp = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';

		return (bool) preg_match($regExp, $email);
	}

	/**
	 * Validate mx record of email.
	 *
	 * @param string $email Email
	 *
	 * @return bool
	 */
	public static function validateMx(string $email): bool {
		if (false === static::validate($email)) {
			return false;
		}

		$domain = substr(strrchr($email, "@"), 1);

		return checkdnsrr($domain, 'MX');
	}
}
