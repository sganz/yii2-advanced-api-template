<?php 
 
//namespace app\models;
namespace api\modules\v1\models;

use yii\base\Model;

/**
 * Simple API Test Model
 *
 * @author Sandy Ganz <sandy@revmaker.us>
 */
 
class Sample extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $other_stuff;

	public function init()
	{
		$this->name = 'Some Name';
		$this->email = 'email@crap.com';
		$this->subject = 'This is the subject of the email';
		$this->body = 'This is the body of the email. It\'s likely a long mess of Ipsums';
		$this->other_stuff = 'This is the secret other stuff variable';
	}
	
    public function attributeLabels()
    {
        return [
            'name' => 'Your name',
            'email' => 'Your email address',
            'subject' => 'Subject',
            'body' => 'Content',
            'other_stuff' => 'Other Stuff',
        ];
    }
}
