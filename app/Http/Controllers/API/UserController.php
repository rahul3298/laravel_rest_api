<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\User as UserResource;
use App\Model\User;
use Validator;

class UserController extends BaseController
{
    
    /**
     * Get Detail of single User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserList(Request $request)
    {
        $result = UserResource::collection(User::paginate());
        return $this->sendResponse($result, 'success');
    }
    
    
    /**
     * Get Detail of single User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $userId = $request->get('user_id');
        $result =  new UserResource(User::find($userId));
        return $this->sendResponse($result, 'success');
    }
    
    /**
     * Alternative Approach to Get User Info
     * Get Detail of single User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserInfoAlt(Request $request)
    {
        $response = [];
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        try{
            $userId = $request->get('user_id');
            $userInfo = User::find($userId);
            $response = $userInfo->toArray();
            $userInfo->posts()->each(function($post)use(&$response){
                $postData = $post->toArray();
                $postData['comments'] = $post->comments()->get()->toArray();
                $response['posts'][] = $postData;
            });
        } catch (Exception $ex){
            return $this->sendError('Validation Error.', [$ex->getMessage()]);
        }
        return $this->sendResponse($response, 'success');
    }

}
