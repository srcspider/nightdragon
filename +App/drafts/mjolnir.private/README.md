This folder contains only security related configuration files and values. On 
some the system will automatically enter a fail state if not configured. A null
value on keys for example is generally not acceptable.

The folder should be placed somewhere outside you public directory. The folder
should also be outside your project files so that it can be reused.

The folder needs to be linked from your `config.php`.