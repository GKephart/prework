<?php
/**
 * Small cross section of a youtube user account
 * @author George Kephart <gkephart@cnm.edu
 **/
class Account {
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
	 * accessor method for account name
	 *
	 * @return string value for account
	 */
	public function getAccountName () {
		return($this->accountName);
	}
	/**
	 * mutator method for account user name
	 * @param string $newAccountName new value of of account user name
	 * @throws InvalidArgumentException if $newTweetContent is not a string or insecure
	 * @throws RangeException if $newAccountName is > 10 characters
	 */
	public function setAccountName($newAccountName) {
		// verify the account name content is secure
		$newAccountName = trim($newAccountName);
		$newAccountName = filter_var($newAccountName, FILTER_SANITIZE_STRING);
		if(empty($newAccountName) === true){
			throw(new InvalidArgumentException("Account name is empty or insecure"));
		}

		// verify the account name will fit into this database
		if(strlen($newAccountName) > 10){
			throw(new RangeException ("Account name is to large"));
		}
		// store the account name
		$this->accountName = $newAccountName;
}
	/**
	 * Accessor method for user information
	 *
	 * @return string value of user information
	 */

	public  function getUserInfo(){
		return($this->userInfo);
	}
	/**
	 * Mutator method for user information
	 *
	 * @param string $newUserInfo new value of user information
	 * @throws InvalidArgumentException if $newUserInfo is not a string or inssecure
	 *@throws RangeException if $newUserInfo is > 100 characters
	 */
	public function setUserInfo ($newUserInfo){
		// verify the user information is correct
		$newUserInfo = trim($newUserInfo);
		$newUserInfo = filter_var($newUserInfo,FILTER_SANITIZE_STRING);

		if(empty($newUserInfo) === true) {
			throw(new InvalidArgumentException("user information is insecure or empty"));
		}
		// veryify the tweet content will fit into the database.
		if(strlen($newUserInfo) > 140){
			throw(new RangeException("user information is to long"));
		}
		//store the tweet content
		$this->userInfo = $newUserInfo;
	}
	/**
	 * Accessor method for salt
	 *
	 * @return string value of salt
	 */

	public  function getSalt(){
		return($this->salt);
	}

	/**
	 * mutator method for user information
	 *
	 * @param string $newSalt new value of user information
	 * @throws InvalidArgumentException if $newSalt is not a string or insecure
	 *@throws RangeException if $newSalt is not 64 characters
	 */

	public function setSalt ($newSalt){
		// verify salt is correct
		$newSalt = trim($newSalt);
		$newSalt = filter_var($newSalt,FILTER_SANITIZE_STRING);
		if(empty($newSalt) === true) {
			throw(new InvalidArgumentException("user salt information is insecure or empty"));
		}
		// veryify salt is the correct length.
		if(strlen($newSalt) !== 64){
			throw(new RangeException("half of the password verification  is not the right length"));
		}
		//store the salt content
		$this->salt = $newSalt;
	}

	/**
	 * Accessor method for hash
	 *
	 * @return string value of hash
	 */

	public  function getHash(){
		return($this->hash);
	}

	/**
	 * mutator method for user information
	 *
	 * @param string $newHash new value of user information
	 * @throws InvalidArgumentException if $newHash is not a string or insecure
	 *@throws RangeException if $newHash is not 128 characters
	 */

	public function setHash ($newHash){
		// verify hash is correct
		$newHash = trim($newHash);
		$newHash = filter_var($newHash,FILTER_SANITIZE_STRING);
		if(empty($newHash) === true) {
			throw(new InvalidArgumentException("user hash information is insecure or empty"));
		}
		// veryify the hash will fit into the database.
		if(strlen($newHash) !== 128 ){
			throw(new RangeException("half of the password verification  is not the right length"));
		}
		//store the hash
		$this->hash = $newHash;
	}

	/**
	 * Accessor method for email
	 *
	 * @return string value of email
	 */

	public  function getEmail(){
		return($this->email);
	}

	/**
	 * mutator method for email
	 *
	 * @param string $newEmail new value of user information
	 * @throws InvalidArgumentException if $newEmail is not a string or insecure
	 *@throws RangeException if $newHash is more than 128 characters
	 */

	public function setEmail ($newEmail){
		// verify the email address is correct
		$newEmail = trim($newEmail);
		$newEmail = filter_var($newEmail,FILTER_SANITIZE_EMAIL);
		if(empty($newEmail) === true) {
			throw(new InvalidArgumentException("user information is insecure or empty"));
		}
		// veryify the email can fit into the database.
		if(strlen($newEmail) > 128){
			throw(new RangeException("Email is to long"));
		}
		//store the tweet content
		$this->email = $newEmail;
	}

}

