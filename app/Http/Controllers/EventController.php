<?php

namespace App\Http\Controllers;

Use App\Models\Event;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        
        return view('events.create');
    }

    public function show($id) {

        $user = auth()->user();

        $hasUserJoined = false;

        if($user) {

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard() {

        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]);
    }

    public function joinEvent($id) {

        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('success', 'Presença confirmada no evento ['.$event->title.'] com Sucesso!');
    }

    public function leaveEvent($id) {

        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('deleted', 'Você removeu sua presença no evento ['.$event->title.']');
    }
    
    public function store(Request $request) {

        $rules = [
            'image' => 'required|image',
            'title' => 'required|unique:events|max:50',
            'date' => 'required|date',
            'description' => 'required|max:7000',
            'category' => ['required', 
                            Rule::in([
                                'Evento Social',
                                'Evento de Tecnologia',
                                'Evento Corporativo',
                                'Evento Religioso',
                                'Evento Educacional',
                                'Evento de Entretenimento e Lazer',
                                'Evento Esportivo'
                            ])],
            'city' => 'required|max:120',
            'items' => 'required'
        ];

        $customErrorMessages = [
            'required' => 'Preencha o campo vazio.',
            'max' => 'Por favor preencha no máximo :size caracteres.',
            'title.unique' => 'Já existe um evento com este título.',
            'image.image' => 'O arquivo deve ser uma imagem.'
        ];

        $request->validate($rules, $customErrorMessages);

        $event = new Event();

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->category = $request->category;
        $event->private = $request->private;
        $event->items = $request->items;

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;

            $extension =  $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('success', 'Evento cadastrado com sucesso!');
    }

    public function edit($id) {

        $user = auth()->user();

        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request) {

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;

            $extension =  $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }
        
        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('success', 'Evento editado com sucesso!');
    }

    public function destroy($id) {

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('deleted', 'Evento excluído com sucesso!');
    }
}
