# -*- mode: ruby -*-
# vi: set ft=ruby :
#
Vagrant.configure(2) do |config|
    # - Official Ubuntu 18.04 LTS Bionic Beaver
    config.vm.box = "ubuntu/bionic64"
    config.vm.network :private_network, ip: "192.168.56.201"
    config.ssh.insert_key = false

    # - do not sync the default vagrant directory
    config.vm.synced_folder ".", "/vagrant", disabled: true
    # www contains web site (PHP)
    config.vm.synced_folder "www/", "/var/www/"
    # webapp contains web applications e.g. node.js/python
    config.vm.synced_folder "webapp/", "/var/webapp/"
    # logs path
    config.vm.synced_folder "log/", "/var/log/", owner: "www-data", group: "www-data", mount_options: ["dmode=775", "fmode=666"] 

    # - configure the virtualbox provider
    config.vagrant.plugins = "vagrant-vbguest"
    config.vm.provider :virtualbox do |v|
        v.name = "vagrant-dev-server"
        v.memory = 4096
        v.cpus = 2
    end

    # - hostname in vm
    # vagrant will generate an inventory file with: `develop ansible_ssh_host=127.0.0.1 ansible_ssh_port=2222`
    config.vm.define "develop" do | develop |
        develop.vm.hostname = "develop-vm"
    end
    # - always execute the Ansible provisioner when vagrant machine is up
    config.vm.provision :ansible, run: "always" do |ansible|
        ansible.extra_vars = { ansible_python_interpreter:"/usr/bin/python3" }
        # ansible.inventory_path = "ansible"
        ansible.config_file = "ansible/ansible.cfg"
        ansible.playbook = "ansible/playbooks/develop-server.yml"
    end
end
