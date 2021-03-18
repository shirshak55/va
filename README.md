# VA

## Screenshots

### Technologies Used

* Laravel v8
* Bootstrap

# Setup

- Install composer and php . Php v8 is preferred
- Copy .env.example to .env
- Install all the package using composer
- Migrate the database
- Seed the database

## Modifications

- remove node related things and used bootstrap for cdn Laravel Mix is too
  bloated, so I thought it would be simple to just use cdn. I do know using cdn
  has no advantage. It's just a throwaway project, so I don't mind.

- Remove test I have not written any unit tests as its simple. I understand it's
  not a Rust lang, but it's ok.

- Use bootstrap paginator instead of default one

- I try to keep things simple. Simple things are always easy to maintain. So you
  may not find me seeing using form request extensively as others do. I use them
  only when my controller starts to become fat

- I follow rule of three, so you may see same abstraction repeated twice but not
  thrice

### Screenshots

Homepage
![](screenshots/homepage.png?raw=true)

Ask Question
![](screenshots/ask_questions.png?raw=true)

Answer Page
![](screenshots/browse_answers.png?raw=true)

Ask Answer
![](screenshots/ask_answers.png?raw=true)

### Author

Shirshak (@shirshak55)
