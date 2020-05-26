# Vagrant provision with Ansible

## Background

This Vagrant profile uses ansible to configure a local VM instance.
Then it uses Ansible to build and run docker containers for a web develop stack.

    - `data`: MySQL data volume on a Busybox container (for persistence).
    - `db`: MySQL database container.


## Get started

To use this repository to spin up a develop server, get following ready:

    1. Virtualbox
    2. vagrant
    3. Ansible

## Update vagrant plugin (optional)
The `VirtualBox Guest Addition` need to be updated with:
```bash
vagrant plugin install vagrant-vbguest
```

You want to check host and guest version by:
```bash
vagrant vbguest -- status
```

Once above packages are ready, goto to folder containing the `Vagrantfile`, simply type `vagrant up` then wait and see.

##  Hosts file (/etc/hosts) update

We need update the `/etc/hosts` file to access the VM from host machine. Add following to bottom of the `/etc/hosts` file.

```
# VM host IP and name
192.168.56.201   info.web.vm
```

## Debug in VS code with xdebug
Add following configure in `.vscode/launch.json`:

```json
        {
            "name": "PHP - Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9000,
            "stopOnEntry": false,
            "pathMappings": {
                "/var/www": "${workspaceFolder}/www"
            },
            "log": true
        }
```

# Create a new repository on the command line

Goto the folder which to create a repository

```
git init
git add .
git commit -m "- Initial commit"
git remote add origin https://github.com/username/your_respository.git
git push -u origin master
```

# Push an existing repository from the command line

``` 
git remote add origin https://github.com/username/your_respository.git
git push -u origin master
```
