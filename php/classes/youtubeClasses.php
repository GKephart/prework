<?php
/**
 * Small cross section of a youtube user account
 * @author George Kephart <gkephart@cnm.edu
 **/
class account {
	/**
	 * id for this account; this is a primary key
	 * @var int $accountId
	 */
	private $accountId;
	/**
	 * This is th name of the profile tied to the account, in an VARCHAR with 32 characters
	 * @var string $accountNAme
	 **/
	private $accountName;
	/**
	 * This is the email associated with the youtube account
	 * @var string $email
	 */
	private $email;
	/** this is a SHA-5-12 hash with 128 bytes
	 * @var int $hash
	 */
	private $hash;
	/**
	 * this is a 64 byte salt used for password verification
	 * @var int $salt
	 */
	private $salt;
	/**
	 * this is a basic description of the person who owns the account
	 *@var string $userInfo
	 */
	private $userInfo;

	/**
	 * accessor method accountId
	 *
	 * @return mixed value of accountId
	 */
	public function getAccountId () {
		return ($this->accountId);
}
	/**
	 * mutator method for accountId
	 * @param mixed $newAccountId new value of account id
	 * @throws InvalidArgumentException if $newAccountId is not an integer or positive
	 * @throws RangeException if $newAccountId is not positive
	 */

	public function setAccountId($newAccountId) {
		// base case: if the account id is null, this is a new account without a mySQL assigned id
		$newAccountId = filter_var($newAccountId, FILTER_VALIDATE_INT);
		if($newAccountId === null){
			$this->accountId = null;
			return;
		}

		if($newAccountId === false) {
			throw(new InvalidArgumentException("profile id is not a valid integer"));
		}

		//verify the accountId is positive
		if($newAccountId <= 0) {
			throw(new RangeException("profile id is not positive."));
		}

		// convert and store the profile id
		$this->accountId = intval($newAccountId);

	}
	/**
	 * accessor method for account namr
	 *
	 * @return string value for tweet content
	 */
	public function getAccountName () {
		return($this->accountName);
	}
	/**
	 * mutator method for account user name
	 * @param string $newAccountName new value of of account user name
	 * @throws InvalidArguementException if $newTweetContent is not a string or insecure
	 * @throws RangeException if $newAccountName is > 10 characters
	 */
	public function


}

