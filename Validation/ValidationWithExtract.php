<?php

namespace Validation;

/**
 * Class ValidationWithExtraction
 * 把原先 new 物件的程式碼 extract 成獨立 function，為了測試程式做準備
 * ref: https://ithelp.ithome.com.tw/articles/10103783
 */
class ValidationWithExtract
{
    public function checkAuthentication(string $id, string $password)
    {
        $accountDao = $this->getAccountDao();
        $passwordByDao = $accountDao->getPassword($id);

        $hash = $this->getHash();
        $hashResult = $hash->getHashResult($password);
        return $passwordByDao === $hashResult;
    }

    protected function getAccountDao()
    {
        $accountDao = new AccountDao();
        return $accountDao;
    }

    protected function getHash()
    {
        $hash = new Hash();
        return $hash;
    }

}

class AccountDao
{
    public function getPassword(string $id)
    {
        //連接DB
        throw new Exception('NotImplementedException.');
    }
}

class Hash
{
    public function getHashResult(string $passwordByDao)
    {
        //使用SHA512
        throw new Exception('NotImplementedException.');
    }
}