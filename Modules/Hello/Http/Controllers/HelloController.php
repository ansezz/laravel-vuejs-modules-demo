<?php

namespace Modules\Hello\Http\Controllers;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Modules\Hello\Http\Requests\HelloCreateRequest;
use Modules\Hello\Http\Requests\HelloUpdateRequest;
use Modules\Hello\Repositories\HelloRepository;
use Modules\Hello\Validators\HelloValidator;

/**
 * Class HellosController.
 *
 * @package namespace App\Http\Controllers;
 */
class HelloController extends Controller
{
    /**
     * @var HelloRepository
     */
    protected $repository;

    /**
     * @var HelloValidator
     */
    protected $validator;

    /**
     * HellosController constructor.
     *
     * @param HelloRepository $repository
     * @param HelloValidator $validator
     */
    public function __construct(HelloRepository $repository, HelloValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $hellos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $hellos,
            ]);
        }

        return view('hellos.index', compact('hellos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HelloCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(HelloCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $hello = $this->repository->create($request->all());

            $response = [
                'message' => 'Hello created.',
                'data' => $hello->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hello = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $hello,
            ]);
        }

        return view('hellos.show', compact('hello'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hello = $this->repository->find($id);

        return view('hellos.edit', compact('hello'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HelloUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(HelloUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $hello = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Hello updated.',
                'data' => $hello->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Hello deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Hello deleted.');
    }
}
