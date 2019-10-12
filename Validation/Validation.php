<?php

namespace Validation;

/**
 * Class Validation
 * 一個用來驗證帳密的 class , 依賴 accountDao 和 hash
 * ref: https://ithelp.ithome.com.tw/articles/10103342
 */
class Validation
{
    public function checkAuthentication(string $id, string $password)
    {
        // 取得資料中，id對應的密碼
        $dao = new AccountDao();
        $passwordByDao = $dao->getPassword($id);

        // 針對傳入的password，進行hash運算
        $hash = new Hash();
        $hashResult = $hash->getHashResult($password);

        // 比對hash後的密碼，與資料中的密碼是否吻合
        return $passwordByDao == $hashResult;
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


try {
    $validation = new Validation();
    $validation->checkAuthentication('tracy', 'abcdef');
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
