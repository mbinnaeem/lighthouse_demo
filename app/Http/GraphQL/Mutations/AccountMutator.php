<?php

namespace App\Http\GraphQL\Mutations;
use JWTAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AccountMutator
{
    /**
     * Return a value for the field.
     *
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param array $args The arguments that were passed into the field.
     * @param GraphQLContext|null $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
     */

    public function login($root, array $args, $context)
    {
        // $data = array_merge($args, [
        //     'grant_type' => 'password',
        //     'scope'      => '',
        // ]);

        // $request = Request::create('oauth/token', 'POST', $data, [], [], [
        //     'HTTP_Accept' => 'application/json',
        // ]);

        // $response = app()->handle($request);
        // $auth_token = json_decode($response->getContent(), true);
        // $user = $this->user($auth_token);
            unset($args['directive']);
        $credentials = $args;
        // echo json_encode($credentials);exit();
        // try {
        //     // verify the credentials and create a token for the user
        //     if (!$token = JWTAuth::attempt($credentials)) {
        //         echo json_encode($credentials);exit();
        //     }
        // } catch (JWTException $e) {
        //     echo json_encode($credentials);exit();
        // }
        if (!$token = auth('api')->attempt($credentials)) {
            $error = array('token'=>'','error'=> 'er');
            return  $error;
        }
        // echo json_encode("qasdasd");exit();
        $user = auth('api')->User();

        return compact('token', 'user');

        // return $user;
    }

 
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
    }
}
