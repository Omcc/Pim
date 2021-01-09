<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Action;
use App\Models\User;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Quill;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;


class EmailSenderScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'EmailSenderScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'this is desc';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'subject'=>date('F'). 'Campaign News'
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Send message')
            ->icon('paper-plane')
            ->method('sendMessage')
        ];
    }

    /**
     * Views.
     *
     * @return string[]|Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('subject')
                ->title('Subject')
                ->required()
                ->placeholder('Message subject line')
                ->help('Enther the subject line for your message'),
                Relation::make('users.')
                ->title('Recipients')
                ->multiple()
                ->required()
                ->placeholder('Email Addesses')
                ->help('Enther the users that you send the mesesage')
                ->fromModel(User::class,'name','email'),
                Quill::make('content')
                ->title('Content')
                ->required()
                ->placeholder('Insert text here ...')
                ->help('Add the content for the message that you would like to send.')
            ])
        ];
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:6|max:50',
            'users' => 'required',
            'content' => 'required|min:10'
        ]);

        Mail::raw($request->get('content'),function(Message $message) use ($request)
        {
            $message->subject($request->get('subject'));
            foreach($request->get('users') as $email)
            {
                $message->to($email);
            }
        });

        Alert::info('Your email message has been sent succesfuly');
    }
}
