<?php
namespace Validation;
use Exception;

/**
 * Class ValidationWithInterface
 * 把依賴以 constructor 的方式注入，並且從原本的依賴特定實作改成依賴介面
 * ref: https://ithelp.ithome.com.tw/articles/10103342
 */
class ValidationWithInterface
{
    private $accountDao;
    private $hash;

    public function __construct(AccountDaoInterface $accountDao, HashInterface $hash)
    {
        $this->accountDao = $accountDao;
        $this->hash = $hash;
    }

    public function checkAuthentication(string $id, string $password)
    {
        // 取得資料中，id對應的密碼
        $passwordByDao = $this->accountDao->getPassword($id);

        // 針對傳入的password，進行hash運算
        $hashResult = $this->hash->getHashResult($password);

        // 比對hash後的密碼，與資料中的密碼是否吻合
        return $passwordByDao === $hashResult;
    }
}


interface AccountDaoInterface
{
    public function getPassword(string $id);
}


interface HashInterface
{
    public function getHashResult(string $passwordByDao);
}


class AccountDao implements AccountDaoInterface
{
    public function getPassword(string $id)
    {
        //連接DB
        throw new Exception('NotImplementedException.');
    }
}


class Hash implements HashInterface
{
    public function getHashResult(string $passwordByDao)
    {
        //使用SHA512
        throw new Exception('NotImplementedException.');
    }
}


try {
    $accountDao = new AccountDao();
    $hash = new Hash();
    $validation = new ValidationWithInterface($accountDao, $hash);
    $validation->checkAuthentication('tracy', 'abcdef');
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
