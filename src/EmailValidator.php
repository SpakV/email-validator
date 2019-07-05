<?php

declare(strict_types=1);

namespace SPakV;

/**
 * Email validator.
 */
class EmailValidator {

	/**
	 * Full validation (format and mx).
	 *
	 * @param string $email Email
	 *
	 * @return bool
	 */
	public static function validate(string $email): bool {
		if (false === static::validateFormat($email)) {
			return false;
		}

		if (false === static::validateMx($email)) {
			return false;
		}

		return true;
	}

	/**
	 * Validation of email format.
	 *
	 * @param string $email Email
	 *
	 * @return bool
	 */
	public static function validateFormat(string $email): bool {
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
		if (false === static::validateFormat($email)) {
			return false;
		}

		$domain = substr(strrchr($email, "@"), 1);

		return checkdnsrr($domain, 'MX');
	}
}
