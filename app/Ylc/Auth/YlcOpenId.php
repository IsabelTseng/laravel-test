<?php

namespace App\Ylc\Auth;

use LightOpenID;

class YlcOpenId extends LightOpenID
{
    protected $lut = [
        'name' => ['namePerson', 'namePerson/friendly'], // 姓名
        'email' => 'contact/email', // 電子郵件

        'schoolid' => 'schoolid', // 學校代碼
        'schooltown' => 'schooltown', // 單位鄉鎮市
        'schoolname' => 'schoolname', // 單位名稱
        'schooltype' => 'schooltype', // 單位別

        'usertype' => 'usertype', // 身份別
        'userjob' => 'userjob', // 行政職務
    ];

    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

    public function setRequired($fields)
    {
        $required = collect();
        foreach ($fields as $field) {
            if (isset($this->lut[$field])) {
                if (is_array($this->lut[$field])) {
                    foreach($this->lut[$field] as $item) {
                        $required[] = $item;
                    }
                } else {
                    $required[] = $this->lut[$field];
                }
            }
        }

        $this->required = $required->merge($this->required)
                            ->unique()
                            ->toArray();
    }

    public function redirect()
    {
        return redirect($this->authUrl());
    }

    public function getData()
    {
        return $this->data;
    }

    public function getIdentity()
    {
        return array_get($this->data, 'openid_identity', null);
    }

    public function getName()
    {
        return array_get($this->data, 'openid_ext1_fullname', null);
    }
    public function getEmail()
    {
        return array_get($this->data, 'openid_ext1_email', null);
    }

    public function getSchoolId()
    {
        return array_get($this->data, 'openid_ext2_value_sid', null);
    }

    public function getSchoolTown()
    {
        return array_get($this->data, 'openid_ext2_value_schooltown', null);
    }

    public function getSchoolName()
    {
        return array_get($this->data, 'openid_ext2_value_schoolname', null);
    }

    public function getSchoolType()
    {
        return array_get($this->data, 'openid_ext2_value_schooltype', null);
    }

    public function getUserType()
    {
        return array_get($this->data, 'openid_ext2_value_usertype', null);
    }

    public function getUserJob()
    {
        return array_get($this->data, 'openid_ext2_value_userjob', null);
    }

    protected function axParams()
    {
        $params = array();
        if ($this->required || $this->optional) {
            $params['openid.ns.ax'] = 'http://openid.net/srv/ax/1.0';
            $params['openid.ax.mode'] = 'fetch_request';
            $this->aliases  = array();
            $counts   = array();
            $required = array();
            $optional = array();
            foreach (array('required','optional') as $type) {
                foreach ($this->$type as $alias => $field) {
                    if (is_int($alias)) $alias = strtr($field, '/', '_');

                    /**
                     * 客製化 schema
                     */
                    if ($field == 'schoolid') {
                        $this->aliases[$alias] = 'http://openid.edu.tw/axschema/school/id';
                    } elseif (in_array($field, ['schooltown', 'schoolname', 'schooltype', 'usertype', 'userjob'])) {
                        $this->aliases[$alias] = 'http://openid.ylc.edu.tw/schema/'.$field;
                    } else {
                        $this->aliases[$alias] = 'http://axschema.org/' . $field;
                    }

                    if (empty($counts[$alias])) $counts[$alias] = 0;
                    $counts[$alias] += 1;
                    ${$type}[] = $alias;
                }
            }
            foreach ($this->aliases as $alias => $ns) {
                $params['openid.ax.type.' . $alias] = $ns;
            }
            foreach ($counts as $alias => $count) {
                if ($count == 1) continue;
                $params['openid.ax.count.' . $alias] = $count;
            }

            # Don't send empty ax.requied and ax.if_available.
            # Google and possibly other providers refuse to support ax when one of these is empty.
            if($required) {
                $params['openid.ax.required'] = implode(',', $required);
            }
            if($optional) {
                $params['openid.ax.if_available'] = implode(',', $optional);
            }
        }
        return $params;
    }
}
